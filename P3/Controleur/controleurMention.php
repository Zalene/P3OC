<?php

require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurMention {

    private $mention;

    public function __construct() {
        $this->mention = new Membre();
    }

    function mentionsLegales() {
        $viewMention = $this->mention->getMention();
        $vue = new Vue("MentionsLegales");
        $vue->generer(array('getMention' => $viewMention));
    }
}