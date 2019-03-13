<?php include("includes/head.php"); ?>
        
        <body>
            <div class="corps">
                <div id="top-header">
                    <?php include("includes/header.php"); ?>
                </div>
                <div id="bottom-header" class="container-fluid col-xs-12"></div>
        
                <div class="container">
                    <h1 class="title-blog">INSCRIPTION MEMBRE</h1>
                    <div class="barre_separation col-xs-offset-4 col-xs-4 col-md-offset-5 col-md-2"></div>
                </div>
                <?php
                include 'includes/functionsSQL.php';        
        
                if(isset($_POST['inscription_button']))
                {
                    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = trim($_POST['password']);
                    $password2 = trim($_POST['password2']);
        
                    $pseudolength = strlen($pseudo);
                    $passwordlength = strlen($password);
        
                    if(!empty($pseudo) AND !empty($email) AND !empty($password) AND !empty($password2))
                    {
                        if($pseudolength <= 25)
                        {
                            $reqpseudo = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');
                            $reqpseudo->execute(array($pseudo));
                            $pseudoexiste = $reqpseudo->rowcount();
        
                            $reqemail = $bdd->prepare('SELECT * FROM membres WHERE email = ?');
                            $reqemail->execute(array($email));
                            $emailexiste = $reqemail->rowcount();
                            if($pseudoexiste == 0 AND $emailexiste == 0)
                            {
                                if(preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $email))
                                {
                                    if($passwordlength >= 8)
                                    {
                                        if($password == $password2)
                                        {
                                            $req = $bdd->prepare('INSERT INTO membres(id_groupe, pseudo, email, pass, date_inscription) VALUES (2, :pseudo, :email, :pass, CURDATE())');
                                            $req->execute(array(
                                                'pseudo' => $pseudo,
                                                'email' => $email,
                                                'pass' => password_hash($password, PASSWORD_DEFAULT)));
                                        }
                                        else
                                        {
                                            $erreur = "Les mots de passe ne sont pas identiques";
                                        }
                                    }
                                    else
                                    {
                                        $erreur = "Votre mot de passe fait moins de 8 caractères";
                                    }
                                }
                                else
                                {
                                    $erreur = "Votre email n'est pas valide";
                                }
                            }
                            else
                            {
                                $erreur = "Ce pseudo ou cette email est déjà utilisé";
                            }
                        }
                        else
                        {
                            $erreur = "Votre pseudo fait plus de 25 caractères";
                        }
                    }
                    else
                    {
                        $erreur = "Veuillez remplir tous les champs";
                    }
                }
                ?>
        
                <div id="formulaire_connexion" class="container">
                    <form method="POST" action="" class="form-horizontal">
                        <fieldset>
        
                        <!-- Pseudo input-->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="pseudo">Pseudo</label>  
                        <div class="col-md-4">
                            <input id="pseudo" name="pseudo" type="text" placeholder="Votre pseudo" class="form-control input-md" required="">      
                        </div>
                        </div>
        
                        <!-- Email input-->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Email</label>  
                        <div class="col-md-4">
                            <input id="email" name="email" type="email" placeholder="Votre email" class="form-control input-md" required="">
                        </div>
                        </div>
        
                        <!-- Password input-->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="password">Mot de passe</label>
                        <div class="col-md-4">
                            <input id="password" name="password" type="password" placeholder="Mot de passe" class="form-control input-md" required="">    
                        </div>
                        </div>
        
                        <!-- Password 2 input-->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="password2">Mot de passe</label>
                        <div class="col-md-4">
                            <input id="password2" name="password2" type="password" placeholder="Confirmation du mot de passe" class="form-control input-md" required="">        
                        </div>
                        </div>
        
                        <!-- Button -->
                        <div class="form-group">
                        <label class="control-label" for="inscription_button"></label>
                        <div class="col-xs-offset-3 col-xs-6 col-sm-offset-4 col-sm-4 col-md-offset-5 col-md-2">
                            <input id="inscription_button" name="inscription_button" type="submit" class="btn btn-block btn-primary btn-lg" value="Inscription">
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