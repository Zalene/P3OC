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

            while ($donnees = $PaginationBlog->fetch())
            {
            ?>
            <div id="news-article" class="container">
                <a href="?action=article&amp;billet=<?php echo $donnees['id']; ?>" id="title-article"><h3><?php echo html_entity_decode($donnees['titre']); ?></h3></a>
                
                <p id="contenu-article"><?php
                // On affiche le contenu du billet
                echo nl2br(html_entity_decode($donnees['contenu']));
                ?>
                </p>
                <div class="col-xs-12">
                    <em id="date-article" class="btn btn-primary btn-sm col-xs-5 col-sm-4 col-md-3 col-lg-2"><span class="fas fa-calendar-alt"></span> <?php echo $donnees['date_creation_fr']; ?></em>
                    <a href="?action=article&amp;billet=<?php echo $donnees['id']; ?>" id="commentaire-article" class="btn btn-primary btn-lg col-xs-6 col-sm-5 col-md-3 col-lg-2 pull-right"><span class="far fa-comments"> Commentaires</span></a>    
                </div>
            </div>
            <?php
            } // Fin de la boucle des billets
            $PaginationBlog->closeCursor();
            ?>
            <div class="container">
                <?php
                    
                    if ($page > 1){
                    ?><a href="?action=blog&amp;page=<?php echo $page - 1; ?>">Page précédente</a> — <?php
                    }

                    // On effectue une boucle autant de fois que l'on a de pages
                    for ($i = 1; $i <= $pageNum; $i++){
                        ?><a href="?action=blog&amp;page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
                    }

                    if ($page < $pageNum){
                        ?>— <a href="?action=blog&amp;page=<?php echo $page + 1; ?>">Page suivante</a><?php
                    }

                    var_dump($pageNum);
                    die;

                ?>
            </div>
    </div>

<?php include("includes/footer.php"); ?>

</body>
</html>