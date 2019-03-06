<?php
require 'Controleur/controleur.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'blog') {
            blog();
        }
    }
    else {
        accueil();
    }
}
catch (Exception $e) {
    erreur($e->getMessage());
}