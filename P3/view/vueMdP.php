<?php include("includes/head.php"); ?>
        
<body>
    <div class="corps">
        <div id="top-header">
            <?php include("includes/header.php"); ?>
        </div>
        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div class="container">
            <h1 class="title-blog">MODIFICATION DE MOT DE PASSE</h1>
            <div class="barre_separation col-xs-offset-4 col-xs-4 col-md-offset-5 col-md-2"></div>
        </div>
        <?php
        include 'includes/functionsSQL.php';

        if(isset($_SESSION['pseudo']))
        {
            if(isset($_POST['modifification_mdp']))
            {
                $password = trim($_POST['password']);
                $password2 = trim($_POST['password2']);
                $oldPassword = trim($_POST['oldPassword']);

                $passwordlength = strlen($password);
                $pseudo = $_SESSION['pseudo'];

                if(!empty($oldPassword) AND !empty($password) AND !empty($password2))
                {
                    $reqId = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
                    $reqId->execute(array($pseudo));
                    $membersExiste = $reqId->rowcount();
                    while ($row = $reqId->fetch()) { $passwordbdd=$row['pass']; $pseudoId=$row['pseudo']; }

                    $pseudoMdpChange = $pseudoId;


                    if($oldPassword == password_verify($oldPassword, $passwordbdd))
                    {
                        if($passwordlength >= 8)
                        {
                            if($password == $password2)
                            {
                                $sth = $bdd->prepare('UPDATE membres SET pass = :pass WHERE pseudo = :pseudo');
                                $sth->bindValue(':pass', password_hash($password, PDO::PARAM_STR));
                                $sth->bindValue(':pseudo', $pseudoMdpChange, PDO::PARAM_STR);
                                $sth->execute();

                                header('Location: index.php');
                            }
                            else
                            {
                                $erreur = "Les mots de passe ne sont pas identiques";
                            }
                        }
                        else
                        {
                            $erreur = "Votre nouveau mot de passe fait moins de 8 caractères";
                        }
                    }
                    else
                    {
                        $erreur = "Votre ancien mot de passe est incorrect";
                    }
                }
                else
                {
                    $erreur = "Veuillez remplir tous les champs";
                }
            }
        }
        ?>

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

<?php include("includes/footer.php"); ?>

</body>
</html>