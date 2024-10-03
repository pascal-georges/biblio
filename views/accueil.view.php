<?php
 // création du buffer php
  ob_start();
?>

<p>Ici la page d'accueil</p>

<?php
  $titre = "Les livres";
  // vidage du buffer dans la variable $content par la fonction ob_get_clean()
  $content = ob_get_clean();
  require "template.php";
?>