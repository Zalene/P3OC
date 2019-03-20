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
    //$connexion = getConnexion();
    require 'view/vueConnexion.php';
}

function inscription() {
    $inscription = getInscription ();
    require 'view/vueInscription.php';
}
function billet() {
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    $limite = 5;
    $id_billet = $_GET['billet'];

    //Billet
    $viewBillet = getViewBillet($id_billet);
    $deleteBillet = getDeleteBillet();
    $buttonAdminBillet = getButtonBillet ();

    //Comments
    $deleteComment = getDeleteComment($id_billet);
    $reportComment = getReportComment($id_billet);
    $listComments = getListComments ($page, $limite);
    $postComment = getPostComment($id_billet);

    //Pagination
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
function adminCreateBillet() {
    $createBillet = getCreateBillet();
    require 'view/vueCreateBillet.php';
}

function adminUpdateBillets() {
    $id_el = $_POST['id'];

    $updateBillet = getUpdateBillet($id_el);
    $pushUpdateBillet = getPushUpdateBillet($id_el);
    require 'view/vueAdminUpdateBillets.php';
}

function adminComments() {
    $unreportComment = getAdminUnreportComment();
    $deleteComment = getAdminDeleteComment();
    $reportedComments = getAdminReportedComments();
    require 'view/vueAdminComments.php';
}

function adminMembers() {
    $deleteMembers = getAdminDeleteMembers();
    $adminMembers = getAdminMembers();
    require 'view/vueAdminMembres.php';
}

function changePassword() {
    //$changePassword = getChangePassword();
    require 'view/vueMdP.php';
}

function deconnexion() {
    $deconnexion = getDeconnexion();
}