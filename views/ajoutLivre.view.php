<?php
 // création du buffer php
  ob_start();
?>

<form method="POST" action="<?= URL ?>livres/av" enctype="multipart/form-data">
<div class="mb-3">
    <label for="domaine" class="form-label">Domaine :</label>
    <input type="text" class="form-control" id="domaine" name="domaine">
  </div>
  <div class="mb-3">
    <label for="auteurId" class="form-label">Id Auteur :</label>
    <input type="number" class="form-control" id="auteurId" name="auteurId">
  </div>
  <div class="mb-3">
    <label for="titre" class="form-label">Titre :</label>
    <input type="text" class="form-control" id="titre" name="titre">
  </div>
  <div class="mb-3">
    <label for="serie" class="form-label">Série :</label>
    <input type="text" class="form-control" id="serie" name="serie">
  </div>
  <div class="mb-3">
    <label for="numSerie" class="form-label">Num Série :</label>
    <input type="number" class="form-control" id="numSerie" name="numSerie">
  </div>
  <div class="mb-3">
    <label for="langue" class="form-label">Langue :</label>
    <input type="text" class="form-control" id="langue" name="langue">
  </div>
  <div class="mb-3">
    <label for="editeur" class="form-label">Editeur :</label>
    <input type="text" class="form-control" id="editeur" name="editeur">
  </div>
  <div class="mb-3">
    <label for="anEdition" class="form-label">Edition :</label>
    <input type="number" class="form-control" id="anEdition" name="anEdition">
  </div>
  <div class="mb-3">
    <label for="proprietaire" class="form-label">Propriétaire :</label>
    <input type="text" class="form-control" id="proprietaire" name="proprietaire">
  </div>
  <div class="mb-3">
    <label for="rangement" class="form-label">Rangement :</label>
    <input type="text" class="form-control" id="rangement" name="rangement">
  </div>
  <div class="mb-3">
    <label for="pret" class="form-label">Prêt :</label>
    <input type="text" class="form-control" id="pret" name="pret">
  </div>
  <div class="mb-3">
  <label for="nomImage" class="form-label">Nom cover : </label>
  <input type="text" class="form-control" id="nomImage" name="nomImage">
</div>
<div class="mb-3">
    <label for="aLire" class="form-label">À lire :</label>
    <input type="text" class="form-control" id="aLire" name="aLire">
  </div>
  <div class="mb-3">
    <label for="estLu" class="form-label">Est lu :</label>
    <input type="text" class="form-control" id="estLu" name="estLu">
  </div>
  <div class="mb-3">
    <label for="commentaire" class="form-label">Commentaire :</label>
    <input type="text" class="form-control" id="commentaire" name="commentaire">
  </div>
<button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
  $titre = "Ajout d'un livre";
  // vidage du buffer dans la variable $content par la fonction ob_get_clean()
  $content = ob_get_clean();
  require "template.php";
?>