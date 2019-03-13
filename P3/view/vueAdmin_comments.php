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
                if(isset($_POST['deleteComment'])){
                $id_el = $_POST['id'];

                $bdd->query("DELETE FROM commentaires WHERE id= $id_el");
            ?>
                <meta http-equiv="refresh" content="1; url=<?php echo $_SERVER["HTTP_REFERER"]  ; ?>" />
            <?php
                }
                if(isset($_POST['unreportComment'])){
                $id_com = $_POST['id'];

                $sth = $bdd->prepare('UPDATE commentaires SET report = 0 WHERE id = :id');
                $sth->bindValue(':id', $id_com, PDO::PARAM_INT);
                $sth->execute();
            ?>
                <meta http-equiv="refresh" content="1; url=<?php echo $_SERVER["HTTP_REFERER"]  ; ?>" />
            <?php
                }

            while ($donnees = $reportedComments->fetch())
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
                                    <input type="submit" name="unreportComment" class="update btn btn-xs" value="Laisser"/>
                                </form>

                                <form method="post" action="" class="delete_form col-xs-3">
                                    <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>
                                    <input type="submit" name="deleteComment" class="delete btn btn-xs" value="Supprimer"/>
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
            $reportedComments->closeCursor();
            ?>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>


</body>
</html>