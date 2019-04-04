<?php

require_once 'Modele/billet.php';
require_once 'Modele/membre.php';
require_once 'view/vue.php';

class ControleurBlog {

    private $billets;

    public function __construct() {
        $this->billets = new Billet();
    }

    public function blog() {
        // On récupère 5 billets par page
        $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
        $limite = 5;

        $allBillets = $this->billets->getChapters($page, $limite);
        $vue = new Vue("Blog");
        //$pageNum = $this->billets->getPagination($page, $limite);
        $vue->generer(array('getChapters' => $allBillets));
    }
}