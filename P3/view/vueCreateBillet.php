<?php include("includes/head.php"); ?>
        
<body>
    <div class="corps">

        <div id="top-header">
            <?php include("includes/header.php"); ?>
        </div>

        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div id="title-book-article" class="container">
            <h1 class="title-blog col-xs-12">CREATION D'ARTICLE</h1>
            <div class="barre_separation col-xs-offset-5 col-xs-2"></div>
        </div>
 
        <!-- CREATION D'UN ARTICLE -->
        <div id="formulaire_connexion" class="container">
            <form method='POST' action='' class="form-horizontal">
            <fieldset>

            <!-- Text input-->
            <div class="form-group">
            <label class="container" for="titre"><p>Titre</p></label>  
            <div class="col-md-12">
                <input id="titre" name="titre" type="text" placeholder="Titre de l'article" class="form-control">
            </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
            <label class="container" for="contenu"><p>Contenu de l'article</p></label>
            <div class="col-md-12">                     
                <textarea class="form-control" id="contenu" name="contenu" placeholder="Votre article" rows="40"></textarea>
            </div>
            </div>

            <!-- Button -->
            <div class="form-group">
            <label class="control-label" for="button_billet"></label>
            <div class="col-xs-offset-3 col-xs-6 col-sm-offset-4 col-sm-4 col-md-offset-5 col-md-2">
                <button id="button_billet" name="button_billet" class="btn btn-block btn-primary btn-lg">Envoyer</button>
            </div>
            </div>

            </fieldset>
            </form>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

</body>
</html>