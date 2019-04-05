<?php

require_once 'Modele/billet.php';
require_once 'Modele/commentaire.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurBillet {

    private $billet;
    private $comment;

    public function __construct() {
        $this->billet = new Billet();
        $this->comment = new Comment();
    }

    public function billet() {
        $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
        $limite = 5;
        $id_billet = $_GET['billet'];

        //Billet
        $viewBillet = $this->billet->getViewBillet($id_billet);
        $deleteBillet = $this->billet->getDeleteBillet();
        //$buttonAdminBillet = $this->billet->getButtonBillet ();

        //Comments
        $listComments = $this->comment->getListComments($id_billet);
        $postComment = $this->comment->getPostComment($id_billet);
        $deleteComment = $this->comment->getDeleteComment($id_billet);
        $reportComment = $this->comment->getReportComment($id_billet);

        $vue = new Vue("Billet");
        $vue->generer(array('getViewBillet' => $viewBillet, 'getListComments' => $listComments, 'getPostComment' => $postComment, 'getDeleteBillet' => $deleteBillet, 'getDeleteComment' => $deleteComment, 'getReportComment' => $reportComment));

        //Pagination
        //$pageNum = $this->billet->getPagination($page, $limite);
        //require 'view/vueBillet.php';

        // Affiche le dernier billet du blog
        //$lastBillet = $this->billet->getLastBillet();
        //$vue = new Vue("Accueil");
        //$vue->generer(array('lastBillet' => $lastBillet));
    }
}