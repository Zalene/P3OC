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
        $debut = ($page - 1) * $limite;

        $allBillets = $this->billets->getChapters($debut, $limite);

        //Pagination
        $paginationBillets = $this->billets->getPaginationBillets($limite);
        $pages = $this->billets->getPage();

        $vue = new Vue("Blog");
        $vue->generer(array('getChapters' => $allBillets, 'getPaginationBillets' => $paginationBillets, 'getPage' => $pages));
    }
}