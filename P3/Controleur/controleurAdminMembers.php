<?php

require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurAdminMembers {

    private $adminMembers;

    public function __construct() {
        $this->adminMembers = new Membre();
    }

    public function adminMembers() {
        $adminMember = $this->adminMembers->getAdminMembers();
        $vue = new Vue("AdminMembres");
        $vue->generer(array('getAdminMembers' => $adminMember));
    }
}