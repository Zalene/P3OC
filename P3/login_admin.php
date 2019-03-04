<?php include("includes/head.php"); ?>
        
<body>
    <div class="corps">
        <div id="top-header">
            <?php include("includes/header.php"); ?>
        </div>
        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div class="container">
            <h1 class="title-blog">CONNEXION ADMINISTRATEUR</h1>
            <div class="barre_separation col-xs-offset-4 col-xs-4 col-md-offset-5 col-md-2"></div>
        </div>

        <div id="formulaire_connexion" class="container">
            <form class="form-horizontal">
                <fieldset>

                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="login_member">Pseudo</label>  
                <div class="col-md-5">
                <input id="login_admin" name="login_admin" type="text" placeholder="Entrez votre email ou votre pseudo" class="form-control input-md" required="">
                    
                </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="password_member">Mot de passe</label>
                <div class="col-md-5">
                    <input id="password_admin" name="password_admin" type="password" placeholder="Entrez votre mot de passe" class="form-control input-md" required="">
                    
                </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                <label class="control-label" for="connexion_member"></label>
                <div class="col-xs-offset-3 col-xs-6 col-sm-offset-4 col-sm-4 col-md-offset-5 col-md-2">
                    <button id="connexion_member" name="connexion_member" class="btn btn-block btn-primary btn-lg">Connexion</button>
                </div>
                </div>

                </fieldset>
            </form>
        </div>
    </div>

<?php include("includes/footer.php"); ?>

</body>
</html>