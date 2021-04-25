<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

       public function destruct($idBillet) {
        $this->billet->delete($idBillet);
        header("Location: index.php");
        die();
        }


    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $etats = $this->billet->Etats($billet['nom_etat']);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'etats' => $etats, 'commentaires' => $commentaires));
    }

    public function modifieretat($etat, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ModifierEtat($etat, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

    public function ajouterTicket($titre, $demande) {
        // Sauvegarde du commentaire
        $this->billet->ajouterticket($titre, $demande);
        header('Location: .');
        die();
    }

        public function ajouterEtat($etat, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterEtat($etat, $idBillet);
        header('Location: .');
        die();
    }




       public function editeBillet($idBillet){
        $billet = $this->billet->getBillet($idBillet);
        $vue = new Vue("Editerbillet");
        $vue->generer(['billet'=>$billet]); //génère ce qu'on met premiere ligne
    }

    public function editionBillet($titre, $idBillet, $contenu) {
        $this->billet->editBillet($titre, $idBillet, $contenu); //fonction vers modele
        header('Location: index.php');
    }
    
}