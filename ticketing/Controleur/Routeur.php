<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurEtat.php';
class Routeur {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlEtat;
    

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlEtat = new ControleurEtat();
        //on ajoute les controleurs a des variable plus simple ppour ne plus mettre$controleur mais this->ctrl
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                } else if ($_GET['action'] == 'ajouter'){
                    $titre = $this->getParametre($_POST, 'titre');
                    $demande = $this->getParametre($_POST, 'demande');
                    $this->ctrlBillet->ajouterTicket($titre, $demande);
                }
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                }
                else if ($_GET['action'] == 'modifieretat'){
                    $etat = $this->getParametre($_POST, 'etats');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->modifieretat($etat, $idBillet);
                }
                else if ($_GET['action'] == 'supprimerbillet'){
                    $idBillet = (int) $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->destruct ($idBillet);
                }
                else if ($_GET['action'] == 'editEtat'){
                     $idetat = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlEtat->editeretat($idetat);
                }
                else if ($_GET['action'] == 'etats'){
                    $this->ctrlEtat->listerEtat();
                }
                else if ($_GET['action'] == 'ajouterEtat'){
                    $nom_etat = $this->getParametre($_POST, 'nom_etat');
                    $this->ctrlEtat->ajouterEtat($nom_etat);
                }
                 else if ($_GET['action'] == 'supprimerEtat'){
                    $id = $this->getParametre($_GET, 'id');
                    $this->ctrlEtat->destruct($id);
                }

                else if ($_GET['action'] == 'editionEtat'){
                    $nom_etat = $this->getParametre($_POST, 'nom_etat');
                    $idetat = intval($this->getParametre($_POST, 'id'));
                    $this->ctrlEtat->editionEtat($idetat,$nom_etat);
                }
                else if ($_GET['action'] == 'editionBillet'){
                    $idBillet = intval($this->getParametre($_POST,'id'));
                    $titre = $this->getParametre($_POST, 'titre');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $this->ctrlBillet->editionBillet($idBillet,$titre,$contenu);// fonction envoyé vers le controleur
                }
                else if ($_GET['action'] == 'editerBillet'){
                    $idBillet = intval($this->getParametre($_GET,'id')); //on recup chemin de l'url
                    $this ->ctrlBillet->editeBillet($idBillet);// fonction envoyé vers le controleur

                }
                 
                 
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}