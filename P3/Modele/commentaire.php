<?php

require_once 'Modele/modele.php';

class Comment extends Modele {

    public function getListComments($id_billet) {//$page, $limite
        // Récupération des commentaires
        $id_billet = $_GET['billet'];
        $limite = 5;
        //$debut = ($page - 1) * $limite;
        $sql = 'SELECT SQL_CALC_FOUND_ROWS id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %H:%i\') AS date_commentaire_fr FROM commentaires WHERE id_billet = '. $id_billet .' ORDER BY date_commentaire DESC LIMIT '. $limite .'';//:debut, :limite
        //$query = $bdd->prepare($query);
        //$query->bindValue('limite', $limite, PDO::PARAM_INT);
        //$query->bindValue('debut', $debut, PDO::PARAM_INT);
        //$query->bindValue('billet', $_GET['billet'], PDO::PARAM_INT);
        //$query->execute();

        $commentsBillet = $this->executerRequete($sql, array());
        return $commentsBillet;
    
        //$resultFoundRows = $bdd->query('SELECT found_rows()');
    
        //$nombredElementsTotal = $resultFoundRows->fetchColumn();
        //return $query;
    }

    public function getUpdateComment() {
        $bdd = $this->getDbConnect();
    
        $id_el = $_POST['id'];
    
        $req = $bdd->query("SELECT id, id_billet, auteur, commentaire FROM commentaires WHERE id= $id_el");
        $donnees = $req->fetch();
        return $req;
    }
    
    public function getDeleteComment($id_billet) {
        $bdd = $this->getDbConnect();
    
        if(isset($_POST['deleteComment'])){
            $id_com = $_POST['id'];
    
            $bdd->query("DELETE FROM commentaires WHERE id= $id_com");
    
            header('Location: index.php?action=article&billet= '. $id_billet .' ');
        }
    }
    
    public function getReportComment($id_billet) {
        $bdd = $this->getDbConnect();
    
        if(isset($_POST['reportComment'])){
            $id_com = $_POST['id'];
    
            $sth = $bdd->prepare('UPDATE commentaires SET report = 1 WHERE id = :id');
            $sth->bindValue(':id', $id_com, PDO::PARAM_INT);
            $sth->execute();
    
            header('Location: index.php?action=article&billet= '. $id_billet .' ');
        }
    }
    
    public function getPostComment($id_billet) {
        $bdd = $this->getDbConnect();
    
        if(isset($_POST['postComment'])) {
    
            $req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, report, date_commentaire) VALUES(?, ?, ?, 0, NOW())');
            $req->execute(array($id_billet, $_POST['auteur'], $_POST['commentaire']));
            
            header('Location: index.php?action=article&billet= '. $id_billet .' ');
        }
    }
    
    public function getUpdateCommentPost() {
        $bdd = $this->getDbConnect();
    
        if(isset($_POST['updateButtonComment'])) {
            $id_el = $_POST['id'];
            $author = $_POST['auteur'];
            $comment = $_POST['commentaire'];
            $billet = $_POST['id_billet'];
    
            $sth = $bdd->prepare('UPDATE commentaires SET auteur = :author, commentaire = :comment WHERE id = :id'); 
            $sth->bindValue(':author', $author, PDO::PARAM_STR); 
            $sth->bindValue(':comment', $comment, PDO::PARAM_STR);
            $sth->bindValue(':id', $id_el, PDO::PARAM_INT); 
            $sth->execute();
    
            header('Location: index.php?action=article&billet= '. $billet .' ');
        }
    }

    //FUNCTION ADMIN
    public function getAdminUnreportComment() {
        if(isset($_POST['unreportComment'])){
            $id_com = $_POST['id'];
    
            $bdd->query("UPDATE commentaires SET report = 0 WHERE id = $id_com");
    
            header('Location: index.php?action=adminComments');
        }
    }
    
    public function getAdminDeleteComment() {
        if(isset($_POST['deleteComment'])){
            $id_com = $_POST['id'];
    
            $bdd->query("DELETE FROM commentaires WHERE id = $id_com");
    
            header('Location: index.php?action=adminComments');
        }
    }
    
    public function getAdminReportedComments() {    
        $sql = 'SELECT id, id_billet, auteur, commentaire, report, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %H:%i\') AS date_commentaire_fr FROM commentaires WHERE report = 1 ORDER BY date_commentaire';
        $viewReportedComments = $this->executerRequete($sql, array());
        return $viewReportedComments;
    }
}