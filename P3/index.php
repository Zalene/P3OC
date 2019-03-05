<?php
require 'Modele.php';

try {
    $lastBillet = getLastBillet();
    require 'view/vueAccueil.php';
}
catch (Exception $e) {
    echo '<html><body>Erreur ! ' . $e->getMessage() . '</body></html>';
}