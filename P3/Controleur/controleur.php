<?php

require 'Modele/Modele.php';

function accueil() {
    // Affiche le dernier billet du blog
    $lastBillet = getLastBillet();
    require 'view/vueAccueil.php';
}

function blog() {
    // On récupère 5 billets par page
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 5;

    $PaginationBlog = getChapters($page, $limite);

    $pageNum = getPagination($page, $limite);
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
function billet() {
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 5;

    $buttonAdminBillet = getButtonBillet ();
    $listComments = getListComments ($page, $limite);
    $pageNum = getPagination($page, $limite);
    require 'view/vueBillet.php';
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

function adminUpdateBillets() {
    $id_el = $_POST['id'];

    $updateBillet = getUpdateBillet($id_el);
    $pushUpdateBillet = getPushUpdateBillet($id_el);
    require 'view/vueAdminUpdateBillets.php';
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