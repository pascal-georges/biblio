<?php
 // création du buffer php
  ob_start();
?>

<form method="POST" action="<?= URL ?>livres/mv" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="domaine" class="form-label">Domaine :</label>
    <input type="text" class="form-control" id="domaine" name="domaine" value="<?= $livre->getDomaine() ?>">
  </div>
  <div class="mb-3">
    <label for="auteurId" class="form-label">Id Auteur :</label>
    <input type="number" class="form-control" id="auteurId" name="AuteurId" value="<?= $livre->getAuteurId() ?>">
  </div>
  <h3>Image origine : </h3>
  <img src="<?= URL ?>public/images/<?= $livre->getCover() ?>">
  <div class="mb-3">
    <label for="image" class="form-label">Changer l'image : </label>
    <input class="form-control" type="text" id="image" name="image">
  </div>
  <input type="hidden" name="identifiant" value="<?= $livre->getId(); ?>">
  <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
  $titre = "Modification du livre : ".$livre->getTitre();
  // vidage du buffer dans la variable $content par la fonction ob_get_clean()
  $content = ob_get_clean();
  require "template.php";
?>