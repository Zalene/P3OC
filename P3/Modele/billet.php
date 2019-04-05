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
    public function getChapters($page, $limite) {
        $debut = ($page - 1) * $limite;
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 5';//:debut, :limite
        //$sql->bindValue('limite', $limite, PDO::PARAM_INT);
        //$sql->bindValue('debut', $debut, PDO::PARAM_INT);
        $billets = $this->executerRequete($sql, array());

        return $billets;

        //$debut = ($page - 1) * $limite;
        //$query = 'SELECT SQL_CALC_FOUND_ROWS id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :debut, :limite';
        //$query = $bdd->prepare($query);
        //$query->bindValue('limite', $limite, PDO::PARAM_INT);
        //$query->bindValue('debut', $debut, PDO::PARAM_INT);
        //$query->execute();

        //$resultFoundRows = $bdd->query('SELECT found_rows()');

        //$nombredElementsTotal = $resultFoundRows->fetchColumn();
        
        // Calcule du nombre de pages
        //$nombreDePages = ceil($nombredElementsTotal / $limite);

        //return $query;
    }

    public function getViewBillet($id_billet) {
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM billets WHERE id = '. $id_billet .'';//id = :id_billet
        //$sql->bindValue('id_billet', $id_billet, PDO::PARAM_INT);
        $billet = $this->executerRequete($sql, array());
        //$req = $bdd->prepare($req);
        //$sql->bindValue('id_billet', $id_billet, PDO::PARAM_INT);
        //$req->execute();
    
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
        $req = $bdd->prepare('SELECT id_groupe FROM membres WHERE id_groupe = 1');
        $donneesGroupe = $req->fetch();
        return $req;
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