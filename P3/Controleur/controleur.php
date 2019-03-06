<?php

require 'Modele/Modele.php';

// Affiche la liste du dernier billet du blog
function accueil() {
    $lastBillet = getLastBillet();
    require 'view/vueAccueil.php';
}

function blog() {
    //$PaginationBlog = getPaginationBlog();
    //$NbPagesBlog = getNbPagesBlog();
    require 'view/vueBlog.php';
}

function biographie() {
    require 'view/vueBio.php';
}

function contact() {
    $lastBillet = getLastBillet();
    require 'view/vueAccueil.php'; //Voir pour être sur le bas de la page d'accueil
}

function connexion() {
    require 'view/vueConnexion.php';
}

function inscription() {
    require 'view/vueInscription.php';
}

// Création d'article
function administration() {
    require 'view/vueAdmin.php';
}

function signalerCommentaire() {
    require 'view/vueAdmin_comments.php';
}

function adminMembres() {
    require 'view/vueAdmin_membres.php';
}

function changerMdP() {
    require 'view/vueMdP.php';
}