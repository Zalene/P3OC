<?php

require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurChangePassword {

    private $changePassword;

    public function __construct() {
        $this->changePassword = new Membre();
    }

    public function changePassword() {
        $passwordChanged = $this->changePassword->getChangePassword();
        $vue = new Vue("MdP");
        $vue->generer(array('getChangePassword' => $passwordChanged));
    }
}