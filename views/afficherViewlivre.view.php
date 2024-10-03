<?php
 // création du buffer php
  ob_start();
?>

<div class="row">
  <div class="col-6">
    <img src="<?= URL ?>public/images/<?= $viewlivre->getCover(); ?>" width="400">
  </div>
  <div class="col-6">
    <h2>Titre : <?= $viewlivre->getTitre(); ?></h2>
    <p>Format : <?= $viewlivre->getFormatLivre(); ?></p>
  </div>
</div>

<?php
  $titre = "Les livres";
  // vidage du buffer dans la variable $content par la fonction ob_get_clean()
  $content = ob_get_clean();
  $titre = $livre->getTitre();
  require "template.php";
?>