<?php

require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurAdminMembers {

    private $adminMembers;
    private $session;

    public function __construct() {
        $this->adminMembers = new Membre();
        $this->session = new Membre();
    }

    public function adminMembers() {
        $adminMember = $this->adminMembers->getAdminMembers();
        $deleteMember = $this->adminMembers->getAdminDeleteMembers();
        $session= $this->session->getMenuSession();
        $vue = new Vue("AdminMembres");
        $vue->generer(array('getAdminMembers' => $adminMember, 'getAdminDeleteMembers' => $adminMember, 'getMenuSession' => $session));
    }
}