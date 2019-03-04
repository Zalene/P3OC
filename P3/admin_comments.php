<?php include("includes/head.php"); ?>
        
<body>
    <div class="corps">

        <div id="top-header">
            <?php include("includes/header.php"); ?>
        </div>

        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div id="title-book-article" class="container">
            <h1 class="title-blog col-xs-12">ADMINISTRATION DES COMMENTAIRES</h1>
            <div class="barre_separation col-xs-offset-5 col-xs-2"></div>
        </div>

        <div class="admin_block">
            <?php
            include 'includes/functionsSQL.php';

            $req = $bdd->query('SELECT id, id_billet, auteur, commentaire, report, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %H:%i\') AS date_commentaire_fr FROM commentaires WHERE report = 1 ORDER BY date_commentaire');
            while ($donnees = $req->fetch())
            {
                $report = $donnees['report'];
                if($report != 0)
                {
                ?>
                    <div class="col-xs-12">
                        <div class="single-commentaire  col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                            <p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
                            <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
                            <div class="col-xs-12">

                                <form method="post" action="unreport_comments.php" class="delete_form col-xs-3">
                                    <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>
                                    <input type="submit" name="valider" class="update btn btn-xs" value="Laisser"/>
                                </form>

                                <form method="post" action="delete_comments.php" class="delete_form col-xs-3">
                                    <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>
                                    <input type="submit" name="valider" class="delete btn btn-xs" value="Supprimer"/>
                                </form>
                            
                            </div>
                        </div>
                    </div>
                <?php 
                }
                else
                {
                ?>
                    <p>Il n'y a aucun commentaire signaler.</p>
                <?php
                }
            }
            $req->closeCursor();
            ?>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>


</body>
</html>