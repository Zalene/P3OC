<?php

require_once 'Modele/billet.php';
require_once 'Modele/commentaire.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurBillet {

    private $billet;
    private $comment;
    private $session;

    public function __construct() {
        $this->billet = new Billet();
        $this->comment = new Comment();
        $this->session = new Membre();
    }

    public function billet() {
        $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
        $limite = 5;
        $debut = ($page - 1) * $limite;
        $id_billet = $_GET['billet'];

        //Billet
        $viewBillet = $this->billet->getViewBillet($id_billet);
        $deleteBillet = $this->billet->getDeleteBillet();
        $buttonAdminBillet = $this->billet->getButtonBillet();

        //Comments
        $listComments = $this->comment->getListComments($debut, $limite, $id_billet);
        $postComment = $this->comment->getPostComment($id_billet);
        $deleteComment = $this->comment->getDeleteComment($id_billet);
        $reportComment = $this->comment->getReportComment($id_billet);

        //Pagination
        $paginationComments = $this->comment->getPaginationComments($limite, $id_billet);
        $pages = $this->comment->getPageComment();

        $session= $this->session->getMenuSession();
        $vue = new Vue("Billet");
        $vue->generer(array('getViewBillet' => $viewBillet, 'getDeleteBillet' => $deleteBillet, 'getButtonBillet' => $buttonAdminBillet, 
        'getListComments' => $listComments, 'getPostComment' => $postComment, 'getDeleteComment' => $deleteComment, 'getReportComment' => $reportComment, 
        'getPaginationComments' => $paginationComments, 'getPageComment' => $pages, 'getMenuSession' => $session));
    }
}