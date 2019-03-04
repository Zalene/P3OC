<?php include("includes/head.php"); ?>
        
<body>
    <div class="corps">

        <div id="top-header">
            <?php include("includes/header.php"); ?>
        </div>
        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div id="title-book-article" class="container">
            <a href="index.php" id="button-article" class="btn btn-lg btn-default col-xs-offset-3 col-xs-6 col-md-offset-4 col-md-4 col-lg-offset-5 col-lg-2"><span class="glyphicon glyphicon-share-alt"></span> Accueil</a>
            <h1 class="title-blog col-xs-12">MODIFICATION D'ARTICLE</h1>
            <div class="barre_separation col-xs-offset-5 col-xs-2"></div>
        </div>
    <?php
    include 'includes/functionsSQL.php';

    // Création du billet

    // Récupération du billet
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM billets WHERE id = ?');
    $req->execute(array($_GET['billet']));
    $donnees = $req->fetch();
    ?> 


        <div id="formulaire_connexion" class="container">
            <form method='POST' action='edit_post.php?post=<?php echo $_GET['billet']; ?>' class="form-horizontal">
            <fieldset>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-xs-4 control-label" for="titre">Titre</label>  
            <div class="col-md-4">
                <textarea class="form-control" id="titre" name="titre" placeholder="Titre de l'article"></textarea>                
            </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="contenu">Contenu de l'article</label>
            <div class="col-md-4">                     
                <textarea class="form-control" id="contenu" name="contenu" placeholder="Votre article"></textarea>
            </div>
            </div>

            <!-- Button -->
            <div class="form-group">
            <label class="control-label" for="button_billet"></label>
            <div class="col-xs-offset-3 col-xs-6 col-sm-offset-4 col-sm-4 col-md-offset-5 col-md-2">
                <button id="button_billet" name="button_billet" class="btn btn-block btn-primary btn-lg">Modifier</button>
            </div>
            </div>

            </fieldset>
            </form>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

</body>
</html>