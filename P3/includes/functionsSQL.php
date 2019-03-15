<?php

    //Connexion à la bdd
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=db_p3_jean_f;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

?>