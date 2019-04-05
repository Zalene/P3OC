<?php

require_once 'Modele/commentaire.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurUpdateComment {

    private $updateComment;

    public function __construct() {
        $this->updateComment = new Comment();
    }

    public function updateComment() {
        $pushUpdateComment = $this->updateComment->getUpdateComment();
        $vue = new Vue("UpdateComment");
        $vue->generer(array('getUpdateComment' => $pushUpdateComment));
    }
}