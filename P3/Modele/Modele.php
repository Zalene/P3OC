<?php

abstract class Modele {

    // Objet PDO d'accès à la BD
    private $bdd;

    // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getDbConnect()->query($sql);    // exécution directe
        }
        else {
            $resultat = $this->getDbConnect()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
    private function getDbConnect() {
        if ($this->bdd == null) {
        // Création de la connexion
        $this->bdd = new PDO('mysql:host=localhost;dbname=db_p3_jean_f;charset=utf8',
            'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
}