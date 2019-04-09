<?php

require_once 'Modele/modele.php';

class Comment extends Modele {

    public function getListComments($debut, $limite, $id_billet) {
        $id_billet = $_GET['billet'];
        $limite = 5;

        $sql = "SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \"%d/%m/%Y à %H:%i\") AS date_commentaire_fr FROM commentaires WHERE id_billet = $id_billet ORDER BY date_commentaire DESC LIMIT $debut, $limite";//:debut, :limite
        $commentsBillet = $this->executerRequete($sql, array());

        return $commentsBillet;
    }

    public function getPaginationComments($limite, $id_billet) {
        $sql = "SELECT COUNT(id) AS nbComments FROM commentaires WHERE id_billet = $id_billet LIMIT $limite";
        $req = $this->executerRequete($sql, array());
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        $nbCommentsTotal = $donnees['nbComments'];
        $nombreDePages = ceil($nbCommentsTotal/$limite);

        return $nombreDePages;
    }

    public function getPageComment() {
        $page = (!empty($_GET['page']) ? $_GET['page'] : 1);

        return $page;
    }
    
    public function getDeleteComment($id_billet) {
        if(isset($_POST['deleteComment'])){
            $id_com = $_POST['id'];
    
            $sql = "DELETE FROM commentaires WHERE id= $id_com";
            $deleteComment = $this->executerRequete($sql, array());
    
            header('Location: index.php?action=article&billet= '. $id_billet .' ');
        }
    }
    
    public function getReportComment($id_billet) {
        if(isset($_POST['reportComment'])){
            $id_com = $_POST['id'];
    
            $sql = "UPDATE commentaires SET report = 1 WHERE id = $id_com";
            $reportComment = $this->executerRequete($sql, array());
    
            header('Location: index.php?action=article&billet= '. $id_billet .' ');
        }
    }
    
    public function getPostComment($id_billet) {
        if(isset($_POST['postComment'])) {
            $sql = 'INSERT INTO commentaires (id_billet, auteur, commentaire, report, date_commentaire) VALUES(?, ?, ?, 0, NOW())';
            $postComment = $this->executerRequete($sql, array($id_billet, $_POST['auteur'], $_POST['commentaire']));
            
            header('Location: index.php?action=article&billet= '. $id_billet .' ');
        }
    }

    public function getUpdateComment($id_el) {
        $sql = "SELECT id, id_billet, auteur, commentaire FROM commentaires WHERE id= $id_el";
        $updateComment = $this->executerRequete($sql, array());

        return $updateComment;
    }
    
    public function getPushUpdateComment($id_el) {
        if(isset($_POST['updateButtonComment'])) {    
            $author = $_POST['auteur'];
            $comment = $_POST['commentaire'];
            $billet = $_POST['id_billet'];

            $sql = "UPDATE commentaires SET auteur = '$author', commentaire = '$comment' WHERE id = '$id_el'";
            $updateComment = $this->executerRequete($sql, array());

            header('Location: index.php?action=article&billet= '. $billet .' ');
        }
    }

    //FUNCTION ADMIN
    public function getAdminUnreportComment() {
        if(isset($_POST['unreportComment'])){
            $id_com = $_POST['id'];
    
            $sql = "UPDATE commentaires SET report = 0 WHERE id = $id_com";
            $unreportAdminComment = $this->executerRequete($sql, array());
    
            header('Location: index.php?action=adminComments');
        }
    }
    
    public function getAdminDeleteComment() {
        if(isset($_POST['deleteComment'])){
            $id_com = $_POST['id'];
    
            $sql = "DELETE FROM commentaires WHERE id = $id_com";
            $deleteAdminComment = $this->executerRequete($sql, array());
    
            header('Location: index.php?action=adminComments');
        }
    }
    
    public function getAdminReportedComments() {    
        $sql = 'SELECT id, id_billet, auteur, commentaire, report, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %H:%i\') AS date_commentaire_fr FROM commentaires WHERE report = 1 ORDER BY date_commentaire';
        $viewReportedComments = $this->executerRequete($sql, array());

        return $viewReportedComments;
    }
}