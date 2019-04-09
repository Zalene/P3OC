<?php

require_once 'Modele/commentaire.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurAdminComments {

    private $adminComments;
    private $session;

    public function __construct() {
        $this->adminComments = new Comment();
        $this->session = new Membre();
    }

    public function adminComments() {
        $adminComment = $this->adminComments->getAdminReportedComments();
        $unreportComment = $this->adminComments->getAdminUnreportComment();
        $deleteComment = $this->adminComments->getAdminDeleteComment();
        $session= $this->session->getMenuSession();
        $vue = new Vue("AdminComments");
        $vue->generer(array('getAdminReportedComments' => $adminComment, 'getAdminUnreportComment' => $unreportComment, 'getAdminDeleteComment' => $deleteComment, 'getMenuSession' => $session));
    }
}