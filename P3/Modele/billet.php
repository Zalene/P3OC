<?php

require_once 'Modele/modele.php';

class Billet extends Modele {

    //FUNCTION ACCUEIL LE DERNIER BILLET
    public function getLastBillet() {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 1';
        $lastBillet = $this->executerRequete($sql, array());
        
        return $lastBillet;
    }

    //FUNCTION BLOG TOUT LES CHAPITRES
    public function getChapters($debut, $limite) {
        $sql = "SELECT id, titre, contenu, DATE_FORMAT(date_creation, \"%d/%m/%Y à %H:%i\") AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT $debut, $limite";//:debut, :limite
        $billets = $this->executerRequete($sql, array());

        return $billets;
    }

    public function getPaginationBillets($limite) {
        $sql = "SELECT COUNT(id) AS nbBillets FROM billets LIMIT $limite";
        $req = $this->executerRequete($sql, array());
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        $nbBilletsTotal = $donnees['nbBillets'];
        $nombreDePages = ceil($nbBilletsTotal/$limite);

        return $nombreDePages;
    }

    public function getPage() {
        $page = (!empty($_GET['page']) ? $_GET['page'] : 1);

        return $page;
    }

    public function getViewBillet($id_billet) {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM billets WHERE id = '. $id_billet .'';//id = :id_billet
        $billet = $this->executerRequete($sql, array());
    
        return $billet;
    }

    //DELETE BILLET
    public function getDeleteBillet() {    
        if(isset($_POST['deleteBillet'])){
            $id_el = $_POST['id'];
    
            $sql1 = "DELETE FROM commentaires WHERE id_billet= $id_el";
            $sql2 = "DELETE FROM billets WHERE id= $id_el";
            $deleteComment = $this->executerRequete($sql1, array());
            $deleteBillet = $this->executerRequete($sql2, array());
    
            header('Location: index.php?action=blog');
        }
    }

    public function getButtonBillet() {
        $sql = 'SELECT id_groupe FROM membres WHERE id_groupe = 1';
        $donneesGroupe = $this->executerRequete($sql, array());
        return $donneesGroupe;
    }

    //FUNCTION ADMIN
    public function getUpdateBillet($id_el) {
        $sql = "SELECT id, titre, contenu FROM billets WHERE id= $id_el";
        $updateBillet = $this->executerRequete($sql, array());
        return $updateBillet;
    }

    public function getPushUpdateBillet($id_el) {
        if(isset($_POST['button_billet'])) {
            $title = $_POST['titre'];
            $content = $_POST['contenu'];

            $sql = "UPDATE billets SET titre = '$title', contenu = '$content' WHERE id = '$id_el'";
            $pushUpdateBillet = $this->executerRequete($sql, array());

            header('Location: index.php?action=article&billet= '. $id_el .' ');
        }
    }

    public function getCreateBillet() {
        if(isset($_POST['button_billet'])) {
            $sql = 'INSERT INTO billets (titre, contenu, date_creation) VALUES(?, ?, NOW())';
            $newBillet = $this->executerRequete($sql, array($_POST['titre'], $_POST['contenu']));
    
            header('Location: index.php?action=blog');
    
            return $newBillet;
        }
    }
}