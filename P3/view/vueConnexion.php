<?php include("includes/head.php"); ?>
        
<body>
    <div class="corps">
        <div id="top-header">
            <?php include("includes/header.php"); ?>
        </div>
        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div class="container">
            <h1 class="title-blog">CONNEXION MEMBRE</h1>
            <div class="barre_separation col-xs-offset-4 col-xs-4 col-md-offset-5 col-md-2"></div>
        </div>

        <div id="formulaire_connexion" class="container">
            <form method="POST" action="" class="form-horizontal">
                <fieldset>

                <!-- Pseudo input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="pseudo">Pseudo</label>  
                <div class="col-md-5">
                <input id="pseudo" name="pseudo" type="text" placeholder="Entrez votre pseudo" class="form-control input-md" required="">
                    
                </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="password">Mot de passe</label>
                <div class="col-md-5">
                    <input id="password" name="password" type="password" placeholder="Entrez votre mot de passe" class="form-control input-md" required="">
                    
                </div>
                </div>

                <!-- Button -->
                <div class="form-group button_connexion">
                <label class="control-label" for="connexion_member"></label>
                <div class="col-xs-offset-3 col-xs-6 col-sm-offset-4 col-sm-4 col-md-offset-5 col-md-2">
                    <input id="connexion_member" name="connexion_member" type="submit" class="btn btn-block btn-primary btn-lg" value="Connexion">
                </div>
                </div>

                </fieldset>
            </form>

            <?php
            if(isset($erreur))
            {
            ?>  
            <div class="col-xs-12"><p class="erreur_inscription"><?php echo $erreur; ?></p></div>
            <?php   
            }
            ?>

            <div class="row separation_inscription">
                <div class="barre_separation col-xs-offset-3 col-xs-2 col-md-offset-4 col-md-1"></div>
                <div class="col-xs-2"><p>ou</p></div>
                <div class="barre_separation col-xs-2 col-md-1"></div>
            </div>

            <div class="col-xs-offset-3 col-xs-6 col-sm-offset-4 col-sm-4 col-md-offset-5 col-md-2">
                <a href="index.php?action=inscription" class="btn btn-block btn-primary btn-lg">Inscription</a>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>

</body>
</html>