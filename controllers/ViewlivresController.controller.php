<?php
require_once "models/ViewlivreManager.class.php";

class ViewlivresController {
    private $viewlivreManager;

    public function __construct(){
        $this->viewlivreManager = new ViewlivreManager;
        $this->viewlivreManager->chargementViewlivres();
    }

    public function afficherViewlivres(): void {
        $livres = $this->viewlivreManager->getViewlivres();
        require "views/viewlivres.view.php";
    }

    public function afficherViewlivre($id) {
        $livre = $this->viewlivreManager->getViewlivreById($id);
        require "views/afficherViewlivre.view.php";
    }
}