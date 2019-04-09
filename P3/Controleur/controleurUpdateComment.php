<?php

require_once 'Modele/commentaire.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurUpdateComment {

    private $updateComment;
    private $session;

    public function __construct() {
        $this->updateComment = new Comment();
        $this->session = new Membre();
    }

    public function updateComment() {
        $id_el = $_POST['id'];

        $updateComment = $this->updateComment->getUpdateComment($id_el);
        $pushUpdateComment = $this->updateComment->getPushUpdateComment($id_el);
        $session= $this->session->getMenuSession();
        $vue = new Vue("UpdateComment");
        $vue->generer(array('getUpdateComment' => $updateComment, 'getPushUpdateComment' => $pushUpdateComment, 'getMenuSession' => $session));
    }
}