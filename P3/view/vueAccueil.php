<?php require("includes/head.php"); ?>
        
<body data-spy="scroll" data-target=".navbar">
    <section id="introduction" class="col-xs-12">
        <?php require("includes/header.php"); ?>
        <div class="container">
            <div class="row">
                <h1>Billet Simple Pour L'Alaska</h1>
            </div>
            <div class="row">
                <?php

                while ($donnees = $lastBillet->fetch())
                {
                ?>
                <div id="news" class="container">
                    <h3>
                        <?php echo html_entity_decode($donnees['titre']); ?>
                        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
                    </h3>
                    
                    <p>
                    <?php
                    // Lien pour le contenu du billet
                    nl2br(htmlspecialchars($donnees['contenu']));
                    ?>
                    <em><a href="?action=article&amp;billet=<?php echo $donnees['id']; ?>"  class="btn btn-lg btn-default">Voir l'article<span class="glyphicon glyphicon-chevron-right"></span></a></em>
                    </p>
                </div>
                <?php
                } // Fin de la boucle des billets
                $lastBillet->closeCursor();
                ?>
            </div>
        </div>
    </section>

    </div class="container">

    <!-- Description courte du roman -->
    <section id="description_roman">
        <div class="container container_accueil">
            <h3>Description du roman</h3>
            <p>Une île sauvage du sud de l'Alaska, accessible uniquement par bateau ou par hydravion, tout en forêts humides et montagnes escarpées. <br>
            C'est dans ce décor que Jim décide d'emmener son fils de treize ans pour y vivre dans une cabane isolée, une année durant. </br>
            Après une succession d'échecs personnels, il voit là l'occasion de prendre un nouveau départ et de renouer avec ce garçon qu'il connaît si mal. </br>    
            Mais la rigueur de cette vie et les défaillances du père ne tardent pas à; transformer ce séjour en cauchemar, et la situation devient vite incontrôlable. </br>
            Jusqu'au drame violent et imprévisible qui scellera leur destin. </p>
        </div>
    </section>

    <div class="barre_separation col-xs-offset-4 col-xs-4 col-md-offset-5 col-md-2"></div>

    <!-- Formulaire de contact -->
    <section id="formulaire_contact">
        <div class="container container_accueil">
            <h3>Me contacter</h3>
            <form id="contact" method="post" action="traitement_contact.php" class="form-horizontal">
                <fieldset>

                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="nom">Nom</label>  
                <div class="col-md-4">
                <input id="nom" name="nom" type="text" placeholder="Prénon et nom" class="form-control input-md">
                    
                </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email</label>  
                <div class="col-md-4">
                <input id="email" name="email" type="text" placeholder="exemple@domaine.com" class="form-control input-md">
                    
                </div>
                </div>

                <!-- Prepended text-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="objet">Objet</label>
                <div class="col-md-4">
                    <input id="objet" name="objet" class="form-control" placeholder="Objet du message" type="text">
                    
                </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                <label class="col-md-4 control-label" for="message">Message</label>
                <div class="col-md-4">                     
                    <textarea class="form-control mceNoEditor" id="message" name="message" placeholder="Vous pouvez saisir un message ici." rows="6"></textarea>
                </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                <label class="col-md-4 control-label" for="envoi"></label>
                <div class="col-md-4">
                    <button type="submit" id="envoi" name="envoi" class="btn btn-primary">Envoyer</button>
                </div>
                </div>

                </fieldset>
            </form>
        </div>
    </section>

<?php require("includes/footer.php"); ?>

</body>
</html>