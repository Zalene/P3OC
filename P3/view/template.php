<?php require("includes/head.php"); ?>
  <body>
    <div class="corps">
      <div id="top-header">
        <?php include("includes/header.php"); ?>
      </div>
      <div id="bottom-header" class="container-fluid col-xs-12"></div>
      
      <div id="contenu">
        <?= $contenu ?>   <!-- Élément spécifique -->
      </div>
      <?php require("includes/footer.php"); ?>
  </body>
</html>