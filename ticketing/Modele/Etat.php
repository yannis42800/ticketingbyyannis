<?php 

//Commande SQL pour les etats...


require_once('Modele/Modele.php');

class Etat extends Modele {


    public function getEtats() {
        $sql = 'SELECT * FROM etats  ORDER BY id DESC';
        return $this->executerRequete($sql);
   
  }

    public function getEtat($idetat) {
        $sql = "SELECT id, nom_etat FROM etats WHERE id = $idetat";
        $etat = $this->executerRequete($sql)->fetch();
        return $etat;
   
  }

    public function EditEtat(){
        $sql = 'UPDATE etats SET nom_etat = ?';
        $modifier = $this->executerRequete($sql, array($etat));

    }
    public function nbetat($idetat){
        $count ="SELECT COUNT(*) FROM billets WHERE TIC_ETAT = $idetat";
        $count-> $this->execute($count);
        $count = $count->fetchColumn();
        return $count;
    }

    public function rename($idetat,$nom_etat){
        $sql = "UPDATE etats SET nom_etat = ? WHERE Id = $idetat";
        $modifier = $this->executerRequete($sql, array($nom_etat));
    }
    
    public function dernierIdEtat(){
        $sql = "SELECT id FROM etats ORDER BY id DESC";
        $req = $this->executerRequete($sql);
        return (int)$req->fetch()["id"];
    }

    public function ajouterEtat($nom_etat) {
        $sql = 'INSERT INTO etats(id,nom_etat) values(?,?)';
        $id = $this->dernierIdEtat() +1;
        $sql = $this->executerRequete($sql, array($id,$nom_etat));
}

    //permet de supprimer un ticket
    public function delete($id){
        $sql = 'DELETE FROM etats  WHERE id = ?';
        $this->executerRequete($sql,array($id));
    
}
}