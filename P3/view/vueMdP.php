<?php require("view/includes/head.php"); ?>
        
<body>
    <div class="corps">
        <div id="top-header">
            <?php require("view/includes/header.php"); ?>
        </div>
        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div class="container">
            <h1 class="title-blog">MODIFICATION DE MOT DE PASSE</h1>
            <div class="barre_separation col-xs-offset-4 col-xs-4 col-md-offset-5 col-md-2"></div>
        </div>
        
        <div id="formulaire_connexion" class="container">
            <form method="POST" action="" class="form-horizontal">
                <fieldset>

                <!-- Old Password input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="oldPassword">Mot de passe</label>
                <div class="col-md-4">
                    <input id="oldPassword" name="oldPassword" type="password" placeholder="Mot de passe actuel" class="form-control input-md" required="">        
                </div>
                </div>

                <!-- New Password input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="password">Nouveau mot de passe</label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="Nouveau mot de passe" class="form-control input-md" required="">    
                </div>
                </div>

                <!-- New Password input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="password2">Nouveau mot de passe</label>
                <div class="col-md-4">
                    <input id="password2" name="password2" type="password" placeholder="Confirmation du nouveau mot de passe" class="form-control input-md" required="">        
                </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                <label class="control-label" for="modifification_mdp"></label>
                <div class="col-xs-offset-3 col-xs-6 col-sm-offset-4 col-sm-4 col-md-offset-5 col-md-2">
                    <input id="modifification_mdp" name="modifification_mdp" type="submit" class="btn btn-block btn-primary btn-lg" value="Modifier">
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
          
        </div>
    </div>

<?php require("view/includes/footer.php"); ?>

</body>
</html>