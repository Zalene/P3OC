<?php include("includes/head.php"); ?>
        
<body>
    <div class="corps">

        <div id="top-header">
            <?php include("includes/header.php"); ?>
        </div>
        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div id="title-book-article" class="container">
            <a href="index.php" id="button-article" class="btn btn-lg btn-default col-xs-offset-3 col-xs-6 col-md-offset-4 col-md-4 col-lg-offset-5 col-lg-2"><span class="glyphicon glyphicon-share-alt"></span> Accueil</a>
            <h1 class="title-blog col-xs-12">MODIFICATION D'UN COMMENTAIRE</h1>
            <div class="barre_separation col-xs-offset-5 col-xs-2"></div>
        </div>
    <?php
    include 'includes/functionsSQL.php';

    $id_el = $_POST['id'];

    $req = $bdd->query("SELECT id, id_billet, auteur, commentaire FROM commentaires WHERE id= $id_el");
    $donnees = $req->fetch();
    ?> 

        <!-- MODIFICATION D'UN COMMENTAIRE -->
        <div id="formulaire_connexion" class="container">
            <form method='POST' action='update_comments_post' class="form-horizontal">
            <fieldset>
                
            <!-- Text input-->
            <div class="form-group">
                <label class="container" for="auteur"><p>Pseudo</p></label>
                    <div class="col-md-offset-4 col-md-4">
                        <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>
                        <input type="hidden" name="id_billet" value="<?php echo $donnees['id_billet'] ?>"/>
                        <input id="auteur" name="auteur" type="text" class="form-control input-md" readonly="readonly" value="<?php echo $donnees['auteur']; ?>">

                    </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="container" for="commentaire"><p>Message</p></label>
                    <div class="col-md-offset-4 col-md-4">                     
                        <textarea class="form-control mceNoEditor" id="commentaire" name="commentaire" rows="6"><?php echo $donnees['commentaire']; ?></textarea>
                    </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Modifier</button>
                    </div>
            </div>
            </fieldset>
            </form>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

</body>
</html>