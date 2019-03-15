<?php

require 'Modele/Modele.php';

function accueil() {
    // Affiche le dernier billet du blog
    $lastBillet = getLastBillet();
    require 'view/vueAccueil.php';
}

function blog() {
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 5;
    $debut = ($page - 1) * $limite;

    $PaginationBlog = getPaginationBlog($page, $limite, $debut);
    require 'view/vueBlog.php';
}

function biographie() {
    require 'view/vueBio.php';
}

function contact() {
    $lastBillet = getLastBillet();
    require 'view/vueAccueil.php';
}

function connexion() {
    require 'view/vueConnexion.php';
}

function inscription() {
    require 'view/vueInscription.php';
}
function commentaires() {
    $buttonAdminBillet = getButtonBillet ();
    $listComments = getListComments ();
    require 'view/vueCommentaires.php';
}

function updateComment() {
    $updateComment = getUpdateComment();
    require 'view/vueUpdateComment.php';
}

function mentionsLegales() {
    require 'view/vueMentionsLegales.php';
}

// ADMIN
// Création d'article
function adminCreateBillet() {
    $createBillet = getCreateBillet();
    require 'view/vueCreateBillet.php';
}//MVC FINI

function adminBillets() {
    $updateBillet = getUpdateBillet();
    //$afterUpdateBillet = getAfterUpdateBillet();
    require 'view/vueAdmin_billets.php';
}

function adminComments() {
    $reportedComments = getReportedComments();
    require 'view/vueAdmin_comments.php';
}

function adminMembers() {
    $adminMembers = getAdminMembers();
    require 'view/vueAdmin_membres.php';
}

function changePassword() {
    //$changePassword = getChangePassword();
    require 'view/vueMdP.php';
}