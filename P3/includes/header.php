<div id="custom-bootstrap-menu" class="navbar navbar-default container" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="index.php">Jean Forteroche</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div id="menu" class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Accueil</a>
                </li>
                <li><a href="blog.php">Blog</a>
                </li>
                <li><a href="bio.php">Biographie</a>
                </li>
                <li><a href="index.php #formulaire_contact">Contact</a>
                </li>
                <?php
                include 'includes/functionsSQL.php';

                if(isset($_SESSION['pseudo']))
                {
                    $reponse = $bdd->query('SELECT * FROM membres WHERE pseudo=\'' .$_SESSION['pseudo']. '\'');

                    while($donnees = $reponse->fetch())
                    {
                        $_SESSION['id_groupe'] = $donnees['id_groupe'];
                    }
                    
                    if($_SESSION['id_groupe'] == 1)
                    {
                ?>
                        <li><a><?php echo $_SESSION['pseudo'] ?> <span class="fa fa-caret-down"></span></a>
                            <ul class="dropdown">
                                <li><a href="admin.php">Création d'article</a></li>
                                <!--<li><a href="#">Modification d'article</a></li>-->
                                <li><a href="admin_comments.php">Commentaires</a></li>
                                <li><a href="#">Membres</a></li>
                                <li><a href="#">Changer de mot de passe</a></li>
                                <li><a href="deconnexion.php">Déconnexion</a></li>
                            </ul>
                        </li>
                <?php
                    }
                    else
                    {
                ?>
                        <li><a><?php echo $_SESSION['pseudo'] ?> <span class="fa fa-caret-down"></span></a>
                            <ul class="dropdown">
                                <li><a href="#">Changer de mot de passe</a></li>
                                <li><a href="deconnexion.php">Déconnexion</a></li>
                            </ul>
                        </li>
                <?php
                    }
                }
                else
                {
                ?>
                    <li><a href="connexion.php">Connexion</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
