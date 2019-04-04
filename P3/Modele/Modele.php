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

    //CONNEXION A LA BDD
    //private function getDbConnect() {
        //$bdd = new PDO('mysql:host=localhost;dbname=db_p3_jean_f;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        //return $bdd;
    //}


    public function getPagination($page, $limite){
        //$bdd = getDbConnect();

        //$query = $bdd->query('SELECT SQL_CALC_FOUND_ROWS id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :debut, :limite');
        //$query = $bdd->prepare($query);
        //$query->bindValue('limite', $limite, PDO::PARAM_INT);
        //$query->bindValue('debut', $debut, PDO::PARAM_INT);
        //$query->execute();

        //$resultFoundRows = $bdd->query('SELECT found_rows()');

        //$nombredElementsTotal = $resultFoundRows->fetchColumn();
        
        // Calcule du nombre de pages
        //$nombreDePages = ceil($nombredElementsTotal / $limite);

        $pageNum = 5;
        return $pageNum;
    }

    //FUNCTION CONTACT




    //function getRepSession() {
        //$bdd = getDb();
        //$reponseSession = $bdd->query('SELECT * FROM membres WHERE pseudo=\'' .$_SESSION['pseudo']. '\'');
        //return $reponseSession;
    //}

}