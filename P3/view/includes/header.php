<div id="custom-bootstrap-menu" class="navbar navbar-default container" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="index.php">Jean Forteroche</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div id="menu" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?action=blog">Blog</a></li>
                <li><a href="index.php?action=bio">Biographie</a></li>
                <li><a href="index.php?action=contact#formulaire_contact">Contact</a></li>
                <?php
                if(isset($_SESSION['pseudo']))
                {
                    while($donnees = $getMenuSession->fetch())
                    {
                        $_SESSION['id_groupe'] = $donnees['id_groupe'];
                    }
                    
                    if($_SESSION['id_groupe'] == 1)
                    {
                ?>
                        <li><a><?php echo $_SESSION['pseudo'] ?> <span class="caret"></span></a>
                            <ul class="dropdown">
                                <li><a href="index.php?action=createBillet">Création d'article</a></li>
                                <li><a href="index.php?action=adminComments">Commentaires</a></li>
                                <li><a href="index.php?action=adminMembers">Membres</a></li>
                                <li><a href="index.php?action=changePassword">Changer de mot de passe</a></li>
                                <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
                            </ul>
                        </li>
                <?php
                    }
                    else
                    {
                ?>
                        <li><a><?php echo $_SESSION['pseudo'] ?> <span class="caret"></span></a>
                            <ul class="dropdown">
                                <li><a href="index.php?action=changePassword">Changer de mot de passe</a></li>
                                <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
                            </ul>
                        </li>
                <?php
                    }
                }
                else
                {
                ?>
                    <li><a href="index.php?action=connexion">Connexion</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
