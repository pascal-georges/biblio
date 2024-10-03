<?php
 // création du buffer php
  ob_start();
?>

<?= $msg; ?>

<?php
  $titre = "Erreur !!!";
  // vidage du buffer dans la variable $content par la fonction ob_get_clean()
  $content = ob_get_clean();
  require "template.php";
?>