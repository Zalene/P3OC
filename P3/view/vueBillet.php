<?php include("includes/head.php"); ?>
        
<body data-spy="scroll" data-target=".navbar">
    <div class="corps">
        <div id="top-header">
            <?php include("includes/header.php"); ?>
        </div>
        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div id="title-book-article" class="container">
            <a href="index.php?action=blog" id="button-article" class="btn btn-lg btn-default col-xs-offset-3 col-xs-6 col-md-offset-4 col-md-4 col-lg-offset-5 col-lg-2"><span class="glyphicon glyphicon-share-alt"></span> Chapitres</a>
            <h1 class="title-blog col-xs-12">BILLET SIMPLE POUR L'ALASKA</h1>
            <div class="barre_separation col-xs-offset-5 col-xs-2"></div>
        </div>
            <?php
            while ($donnees = $viewBillet->fetch())
            {
            ?>

            <div id="news" class="container">
                <h3 id="title-article"><?php echo html_entity_decode($donnees['titre']); ?></h3>

                <p><?php echo nl2br(html_entity_decode($donnees['contenu']));?></p>

                <div class="col-xs-12 edit_button">
                    <div class="col-xs-6">
                        <em>Publié le <?php echo $donnees['date_creation_fr']; ?></em>
                    </div>

                    <?php
                    if(isset($_SESSION['pseudo']))
                    {
                        if($_SESSION['id_groupe'] == 1)
                        {
                    ?>
                            <div class="col-xs-offset-2 col-xs-1 col-sm-offset-4 col-sm-1">
                                <form method="post" action="index.php?action=updateBillet" class="update_form">
                                    <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>
                                    <input type="submit" name="update" class="update btn btn-xs" value="Modifier"/>
                                </form>

                            </div>    
                            <div class="col-xs-2 col-sm-1 pull-right">
                                <form method="post" action="" class="delete_form"> <!-- delete_billet.php -->
                                    <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>
                                    <input type="submit" name="deleteBillet" class="delete btn btn-xs" value="Supprimer"/>
                                </form>
                            </div>
                    <?php
                    
                        }
                    }
            }
            ?>
            </div>

        </div>

        <div class="container">
            <div class="barre_separation col-xs-offset-5 col-xs-2"></div>
        </div>

        <div class="container commentaire-block" id="list_commentaires">
            <h2>Commentaires</h2>

            <?php
            while ($donnees = $listComments->fetch())
            {
            ?>
            <div class="col-xs-12">
                <div class="single-commentaire  col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                    <p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
                    <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
                    <?php 
                    if(isset($_SESSION['pseudo']))
                    {
                    ?>
                        <div class="col-xs-12">
                        <?php
                        if($_SESSION['pseudo'] == $donnees['auteur'])
                        {
                        ?>
                            <form method="post" action="index.php?action=updateComment" class="delete_form col-xs-3">
                                <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>
                                <input type="submit" name="updateComment" class="update btn btn-xs" value="Modifier"/>
                            </form>

                            <form method="post" action="" class="delete_form col-xs-3">
                                <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>
                                <input type="submit" name="deleteComment" class="delete btn btn-xs" value="Supprimer"/>
                            </form>
                        <?php
                        }
                        ?>
                            <form method="post" action="" class="delete_form pull-right col-xs-3">
                                <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>
                                <input type="submit" name="reportComment" class="delete btn btn-xs btn-danger pull-right" value="Signaler"/>
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            } // Fin de la boucle des commentaires
            $listComments->closeCursor();
            ?>
        </div>
        <div class="container">
                <?php

                if ($page > 1):
                    ?><a href="?action=article&amp;billet=<?php echo $_GET['billet'];?>&amp;page=<?php echo $page - 1; ?>#list_commentaires">Page précédente</a> — <?php
                endif;

                for ($i = 1; $i <= $pageNum; $i++):
                    ?><a href="?action=article&amp;billet=<?php echo $_GET['billet'];?>&amp;page=<?php echo $i; ?>#list_commentaires"><?php echo $i; ?></a> <?php
                endfor;

                if ($page < $pageNum):
                    ?>— <a href="?action=article&amp;billet=<?php echo $_GET['billet'];?>&amp;page=<?php echo $page + 1; ?>#list_commentaires">Page suivante</a><?php
                endif;
                ?>
            </div>
            <?php
            if(isset($_SESSION['pseudo']))
            {
            ?>
            <div class="container formulaire-commentaire">
                <form method='POST' action='' class="form-horizontal">
                    <fieldset>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="auteur">Pseudo</label>  
                            <div class="col-md-4">
                                <input id="auteur" name="auteur" type="text" class="form-control input-md" readonly="readonly" value="<?php echo $_SESSION['pseudo']; ?>">
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="commentaire">Message</label>
                            <div class="col-md-4">                     
                                <textarea class="form-control mceNoEditor" id="commentaire" name="commentaire" placeholder="Vous pouvez saisir un message ici." rows="6"></textarea>
                            </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                            <div class="col-md-4">
                                <button id="singlebutton" name="postComment" class="btn btn-primary">Envoyer</button>
                            </div>
                    </div>
                    </fieldset>
                </form>
            </div>
            <?php
            }
            ?>
    </div>

    <?php include("includes/footer.php"); ?>

</body>
</html>