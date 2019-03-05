<?php

function getDb() {
    //Connexion à la bdd
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

function getLastBillet() {
    $bdd = getDb();
    // On récupère le dernier billet
    $lastBillet = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 1');
    return $lastBillet;
}

//function getRepSession() {
    //$bdd = getDb();
    //$reponseSession = $bdd->query('SELECT * FROM membres WHERE pseudo=\'' .$_SESSION['pseudo']. '\'');
    //return $reponseSession;
//}