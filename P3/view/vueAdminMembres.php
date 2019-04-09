<?php require("view/includes/head.php"); ?>
        
<body>
    <div class="corps">

        <div id="top-header">
            <?php require("view/includes/header.php"); ?>
        </div>

        <div id="bottom-header" class="container-fluid col-xs-12"></div>

        <div id="title-book-article" class="container">
            <h1 class="title-blog col-xs-12">ADMINISTRATION DES MEMBRES</h1>
            <div class="barre_separation col-xs-offset-5 col-xs-2"></div>
        </div>

        <div class="admin_block">
            <div  class="container">
                <table class="table_members col-xs-12 col-md-offset-3 col-md-6">
                    <thead>
                        <tr>
                            <th>Pseudo</th>
                            <th>Email</th>
                            <th>Inscription</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    while($donnees = $getAdminMembers->fetch())
                    {
                    ?>
                        <tr>
                            <td><?php echo $donnees['pseudo']; ?></td>
                            <td><?php echo $donnees['email']; ?></td>
                            <td><?php echo $donnees['date_inscription_fr']; ?></td>
                            <td>    
                                <form method="post" action="" class="delete_form">
                                    <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>
                                    <input type="submit" name="deleteMember" class="delete btn btn-xs" value="Supprimer"/>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    $getAdminMembers->closeCursor();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require("view/includes/footer.php"); ?>


</body>
</html>