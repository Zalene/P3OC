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
        $listComments = $this->comment->getListComments($id_billet);
        //$deleteBillet = $this->billet->getDeleteBillet();
        //$buttonAdminBillet = $this->billet->getButtonBillet ();
        $vue = new Vue("Billet");
        $vue->generer(array('getViewBillet' => $viewBillet, 'getListComments' => $listComments));
        //$vue->generer(array('getViewBillet' => $viewBillet));

        //Comments
        //$listComments = $this->billet->getListComments ($page, $limite);
        //$listComments = $this->comment->getListComments ($page, $limite);
        //$vue = new Vue("Comments");
        //$vue->generer(array('getListComments' => $listComments));
        //$deleteComment = $this->billet->getDeleteComment($id_billet);
        //$reportComment = $this->billet->getReportComment($id_billet);
        //$postComment = $this->billet->getPostComment($id_billet);

        //Pagination
        //$pageNum = $this->billet->getPagination($page, $limite);
        //require 'view/vueBillet.php';

        // Affiche le dernier billet du blog
        //$lastBillet = $this->billet->getLastBillet();
        //$vue = new Vue("Accueil");
        //$vue->generer(array('lastBillet' => $lastBillet));
    }
}