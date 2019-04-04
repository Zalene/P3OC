<?php
session_start();
require 'Controleur/routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();