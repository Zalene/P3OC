<?php require("view/includes/head.php"); ?>
        
<body>
    <div class="corps">
        <div id="top-header">
            <?php require("view/includes/header.php"); ?>
        </div>
        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div class="container">
            <h1 class="title-blog">BILLET SIMPLE POUR L'ALASKA</h1>
            <div class="barre_separation col-xs-offset-4 col-xs-4 col-md-offset-5 col-md-2"></div>
            <h2 class="chapitre-blog">Liste des chapitres</h2>
        </div>
            <?php
            while ($donnees = $getChapters->fetch())
            {
            ?>
            <div id="news-article" class="container">
                <a href="?action=article&amp;billet=<?php echo $donnees['id']; ?>" id="title-article"><h3><?php echo html_entity_decode($donnees['titre']); ?></h3></a>

                <p id="contenu-article">
                <?php
                $description = $donnees['contenu'];
                if (strlen($description) > 900) {
                    $apercu_description =  substr($description, 0, 900);
                    echo  $apercu_description .". . ." ;
                }
                else{
                    echo $description ;
                }
                ?>
                </p>
                <div class="col-xs-12">
                    <em id="date-article" class="col-xs-5 col-sm-4 col-md-3 col-lg-2"><span class="fas fa-calendar-alt"></span> <?php echo $donnees['date_creation_fr']; ?></em>
                    <a href="?action=article&amp;billet=<?php echo $donnees['id']; ?>" id="commentaire-article" class="btn btn-primary btn-md col-xs-6 col-sm-5 col-md-3 col-lg-2 pull-right"><span class="far fa-comments"> Commentaires</span></a>    
                </div>
            </div>
            <?php
            }

            ?>
            <div class="container">
                <ul class="pagination">
                    <?php
                        if ($getPage > 1){
                        ?><li class="previous"><a href="?action=blog&amp;page=<?php echo $getPage - 1; ?>">Précédent</a></li><?php
                        }

                        // On effectue une boucle autant de fois que l'on a de pages
                        for ($i = 1; $i <= $getPaginationBillets; $i++){
                            ?><li><a href="?action=blog&amp;page=<?php echo $i; ?>"><?php echo $i; ?></a></li> <?php
                        }

                        if ($getPage < $getPaginationBillets){
                            ?><li class="next"><a href="?action=blog&amp;page=<?php echo $getPage + 1; ?>">Suivant</a></li><?php
                        }
                    ?>
                </ul>
            </div>
    </div>

<?php require("view/includes/footer.php"); ?>

</body>
</html>