<?php
ob_start();

if (!empty($_SESSION['alert'])) :
?>

<div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
  <?= $_SESSION['alert']['msg'] ?>
</div>

<?php 
unset($_SESSION['alert']);
endif; 
?>


<table class="table text-center">
  <tr class="table-dark">
    <th>Cover</th>
    <th>Domaine</th>
    <th>Série</th>
    <th>Num Série</th>
    <th>Id Auteur</th>
    <th>Titre</th>
    <th>Format</th>
    <th colspan="2">Actions</th>
  </tr>

  <?php

  for ($i = 0; $i < count($viewlivres); $i++) : ?>
    <tr>
      <td class="align-middle"><img src="./public/images/<?= $viewlivres[$i]->getCover(); ?>" width="60px"></td>
      <td class="align-middle"><?= $viewlivres[$i]->getDomaine(); ?></td>
      <td class="align-middle"><?= $viewlivres[$i]->getSerie(); ?></td>
      <td class="align-middle"><?= $viewlivres[$i]->getNumSerie(); ?></td>
      <td class="align-middle"><?= $viewlivres[$i]->getAuteurId(); ?></td>
      <td class="align-middle"><a href="<?= URL ?>livres/l/<?= $viewlivres[$i]->getId(); ?>"><?= $viewlivres[$i]->getTitre(); ?></a></td>
      <td class="align-middle"><?= $viewlivres[$i]->getFormatLivre(); ?></td>
      <td class="align-middle"><a href="<?= URL ?>livres/m/<?= $viewlivres[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
      <td class="align-middle">
        <form method="POST" action="<?= URL ?>livres/s/<?= $viewlivres[$i]->getId(); ?>" onSubmit="return confirm ('Voulez-vous vraiment supprimer ce livre ?');">
          <button class="btn btn-danger" type="submit">Supprimer</button>
        </form>
      </td>
    </tr>
  <?php endfor; ?>

</table>

<a href="<?= URL ?>livres/a" class="btn btn-success d-block">Ajouter</a>

<?php
  $titre = "Les livres";
  $content = ob_get_clean();
  require "template.php";
?>