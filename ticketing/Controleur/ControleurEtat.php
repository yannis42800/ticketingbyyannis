<?php

require_once 'Modele/Etat.php';
require_once 'Vue/Vue.php';

class ControleurEtat {

    private $etat;


     public function __construct() {
        $this->etat = new Etat();
    
    }

    public function listerEtat(){
        $etats = $this->etat->getEtats();

        $vue = new Vue("Etat");
        $vue->generer(['etats'=>$etats]);
    }



    
  public function getnbetat(){
    $nb = $this->billet->nbetat();
    $vue = new Vue("Etat"); //tu affiche la vue qui s'appele accueil
    $vue->generer(['nb'=>$nb]);

  }
    // Supprimer un état
    public function destruct($id){
        $this->etat->delete($id);
         header('Location: index.php?action=etats');
        die();
    }

    //modifier un état
    public function editionEtat($idetat,$nom_etat){
        $this->etat->rename($idetat,$nom_etat);
        header('Location: index.php?action=etats');
    }

    public function editeretat($idetat){
        $etat = $this->etat->getEtat($idetat);
        $vue = new Vue("Editeretat");
        $vue->generer(['etat'=>$etat]);
    }

    

    //ajouter un état
    public function ajouterEtat($nom_etat){
        $this->etat->ajouterEtat($nom_etat);
        header('Location: index.php?action=etats');
    }


    

    }
