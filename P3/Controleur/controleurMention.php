<?php

require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurMention {

    private $mention;
    private $session;

    public function __construct() {
        $this->mention = new Membre();
        $this->session = new Membre();
    }

    function mentionsLegales() {
        $viewMention = $this->mention->getMention();
        $session= $this->session->getMenuSession();
        $vue = new Vue("MentionsLegales");
        $vue->generer(array('getMention' => $viewMention, 'getMenuSession' => $session));
    }
}