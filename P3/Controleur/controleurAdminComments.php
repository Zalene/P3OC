<?php

require_once 'Modele/commentaire.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurAdminComments {

    private $adminComments;

    public function __construct() {
        $this->adminComments = new Comment();
    }

    public function adminComments() {
        $adminComment = $this->adminComments->getAdminReportedComments();
        $vue = new Vue("AdminComments");
        $vue->generer(array('getAdminReportedComments' => $adminComment));
    }
}