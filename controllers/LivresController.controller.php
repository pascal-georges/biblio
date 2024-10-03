<?php
require_once "models/LivreManager.class.php";

class LivresController {
    private $livreManager;

    public function __construct(){
        $this->livreManager = new LivreManager;
        $this->livreManager->chargementLivres();
    }

    public function afficherLivres(): void {
        $livres = $this->livreManager->getLivres();
        require "views/livres.view.php";
    }

    public function afficherLivre($id) {
        $livre = $this->livreManager->getLivreById($id);
        require "views/afficherLivre.view.php";
    }

    public function ajoutLivre() {
        require "views/ajoutLivre.view.php";
    }

    public function ajoutLivreValidation() {
        $this->livreManager->ajoutLivreBd(  $_POST['domaine'], 
                                            $_POST['auteurId'], 
                                            $_POST['titre'], 
                                            $_POST['serie'], 
                                            $_POST['numSerie'], 
                                            $_POST['langue'], 
                                            $_POST['editeur'], 
                                            $_POST['formatLivre'], 
                                            $_POST['anEdition'], 
                                            $_POST['proprietaire'], 
                                            $_POST['rangement'], 
                                            $_POST['pret'], 
                                            $_POST['cover'], 
                                            $_POST['aLire'], 
                                            $_POST['estLu'], 
                                            $_POST['commentaire']);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajout réalisé"
        ];

        header('location: ' . URL . "livres");
    }

    public function suppressionLivre($id) {
        $nomImage = $this->livreManager->getLivreById($id)->getImage();
        unlink("public/images/".$nomImage);
        $this->livreManager->suppressionLivreBd($id);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression réalisée"
        ];

        header('location: ' . URL . "livres");
    }

    public function modificationLivre($id) {
        $livre = $this->livreManager->getLivreById($id);
        require "views/modifierLivre.view.php";
    }

    public function modificationLivreValidation() {
        $this->livreManager->modificationLivreBd(
                                                $_POST['identifiant'], 
                                                $_POST['domaine'], 
                                                $_POST['auteurId'], 
                                                $_POST['$titre'],
                                                $_POST['$serie'],
                                                $_POST['$numSerie'],
                                                $_POST['$langue'],
                                                $_POST['$editeur'],
                                                $_POST['$formatLivre'],
                                                $_POST['$anEdition'],
                                                $_POST['$proprietaire'],
                                                $_POST['$rangement'],
                                                $_POST['$pret'],
                                                $_POST['$cover'],
                                                $_POST['$aLire'],
                                                $_POST['$estLu'],
                                                $_POST['$commentaire'],
                                            );
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Modification réalisée"
        ];

        header('location: ' . URL . "livres");
    }
}

