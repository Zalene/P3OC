<?php include("includes/head.php"); ?>
        
<body>
    <div class="corps">
        <div id="top-header">
            <?php include("includes/header.php"); ?>
        </div>
        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div class="container">
            <h1 class="title-blog">BILLET SIMPLE POUR L'ALASKA</h1>
            <div class="barre_separation col-xs-offset-4 col-xs-4 col-md-offset-5 col-md-2"></div>
            <h2 class="chapitre-blog">Liste des chapitres</h2>
        </div>
            <?php
            include 'includes/functionsSQL.php';

            // On récupère 5 billets par page
            $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
            $limite = 5;
            
            $debut = ($page - 1) * $limite;
            $query = 'SELECT SQL_CALC_FOUND_ROWS id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :debut, :limite';
            $query = $bdd->prepare($query);
            $query->bindValue('limite', $limite, PDO::PARAM_INT);
            $query->bindValue('debut', $debut, PDO::PARAM_INT);
            $query->execute();

            $resultFoundRows = $bdd->query('SELECT found_rows()');

            $nombredElementsTotal = $resultFoundRows->fetchColumn();
            
            while ($donnees = $query->fetch())
            {
            ?>
            <div id="news-article" class="container">
                <a href="commentaires.php?billet=<?php echo $donnees['id']; ?>" id="title-article"><h3><?php echo html_entity_decode($donnees['titre']); ?></h3></a>
                
                <p id="contenu-article"><?php
                // On affiche le contenu du billet
                echo nl2br(html_entity_decode($donnees['contenu']));
                ?>
                </p>
                <div class="col-xs-12">
                    <em id="date-article" class="btn btn-primary btn-sm col-xs-5 col-sm-4 col-md-3 col-lg-2"><span class="fas fa-calendar-alt"></span> <?php echo $donnees['date_creation_fr']; ?></em>
                    <a href="commentaires.php?billet=<?php echo $donnees['id']; ?>" id="commentaire-article" class="btn btn-primary btn-lg col-xs-6 col-sm-5 col-md-3 col-lg-2 pull-right"><span class="far fa-comments"> Commentaires</span></a>    
                </div>
            </div>
            <?php
            } // Fin de la boucle des billets
            $query->closeCursor();
            ?>
            <div class="container">
                <?php
                // Calcule du nombre de pages
                $nombreDePages = ceil($nombredElementsTotal / $limite);

                if ($page > 1):
                    ?><a href="?action=blog&amp;page=<?php echo $page - 1; ?>">Page précédente</a> — <?php
                endif;

                // On effectue une boucle autant de fois que l'on a de pages
                for ($i = 1; $i <= $nombreDePages; $i++):
                    ?><a href="?action=blog&amp;page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                endfor;

                if ($page < $nombreDePages):
                    ?>— <a href="?action=blog&amp;page=<?php echo $page + 1; ?>">Page suivante</a><?php
                endif;
                ?>
            </div>
    </div>

<?php include("includes/footer.php"); ?>

</body>
</html>