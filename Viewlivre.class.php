<?php
class Viewlivre {
  private $id;
  private $domaine;
  private $auteurId;
  private $auteur;
  private $titre;
  private $serie;
  private $numSerie;
  private $langue;
  private $editeur;
  private $formatLivre;
  private $anEdition;
  private $proprietaire;
  private $rangement;
  private $pret;
  private $cover;
  private $aLire;
  private $estLu;
  private $commentaire;

  public function __construct($id, 
                              $domaine, 
                              $auteurId, 
                              $auteur, 
                              $titre, 
                              $serie, 
                              $numSerie, 
                              $langue,
                              $editeur, 
                              $formatLivre, 
                              $anEdition, 
                              $proprietaire, 
                              $rangement, 
                              $pret, 
                              $cover, 
                              $aLire, 
                              $estLu, 
                              $commentaire) {
    $this->id = $id;
    $this->domaine = $domaine;
    $this->auteurId = $auteurId;
    $this->auteur = $auteur;
    $this->titre = $titre;
    $this->serie = $serie;
    $this->numSerie = $numSerie;
    $this->langue = $langue;
    $this->editeur = $editeur;
    $this->formatLivre = $formatLivre;
    $this->anEdition = $anEdition;
    $this->proprietaire = $proprietaire;
    $this->rangement = $rangement;
    $this->pret = $pret;
    $this->cover = $cover;
    $this->aLire = $aLire;
    $this->estLu = $estLu;
    $this->commentaire = $commentaire;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getDomaine() {
    return $this->domaine;
  }

  public function setDomaine($domaine) {
    $this->domaine = $domaine;
  }

  public function getAuteurId() {
    return $this->auteurId;
  }

  public function setAuteurId($auteurId) {
    $this->auteurId = $auteurId;
  }

  public function getAuteur() {
    return $this->auteur;
  }

  public function setAuteur($auteur) {
    $this->auteur = $auteur;
  }

  public function getTitre() {
    return $this->titre;
  }

  public function setTitre($titre) {
    $this->titre = $titre;
  }

  public function getSerie() {
    return $this->serie;
  }

  public function setSerie($serie) {
    $this->serie = $serie;
  }

  public function getNumSerie() {
    return $this->numSerie;
  }

  public function setNumSerie($numSerie) {
    $this->numSerie = $numSerie;
  }

  public function getLangue() {
    return $this->langue;
  }

  public function setLangue($langue) {
    $this->langue = $langue;
  }

  public function getEditeur() {
    return $this->editeur;
  }

  public function setEditeur($editeur)  {
    $this->editeur = $editeur;
  }

  public function getFormatLivre() {
    return $this->formatLivre;
  }

  public function setFormatLivre($formatLivre) {
    $this->formatLivre = $formatLivre;
  }

  public function getAnEdition() {
    return $this->anEdition;
  }

  public function setAnEdition($anEdition) {
    $this->anEdition = $anEdition;
  }

  public function getProprietaire() {
    return $this->proprietaire;
  }

  public function setProprietaire($proprietaire) {
    $this->proprietaire = $proprietaire;
  }
  public function getRangement() {
    return $this->rangement;
  }

  public function setRangement($rangement) {
    $this->rangement = $rangement;
  }
  public function getPret() {
    return $this->pret;
  }

  public function setPret($pret) {
    $this->pret = $pret;
  }
  public function getCover() {
    return $this->cover;
  }

  public function setCover($cover) {
    $this->cover = $cover;
  }
  public function getALire() {
    return $this->aLire;
  }

  public function setALire($aLire) {
    $this->aLire = $aLire;
  }
  public function getEstLu() {
    return $this->estLu;
  }

  public function setEstLu($estLu) {
    $this->estLu = $estLu;
  }
  public function getCommentaire() {
    return $this->commentaire;
  }

  public function setCommentaire($commentaire) {
    $this->commentaire = $commentaire;
  }
}
