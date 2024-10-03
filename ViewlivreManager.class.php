<?php
require_once "Model.class.php";
require_once "Viewlivre.class.php";

class ViewlivreManager extends Model {
    private $viewlivres; // tableau de livres

    public function ajoutViewlivre($viewlivre){
        $this->viewlivres[] = $viewlivre;
    }

    public function getViewlivres() {
        return $this->viewlivres;
    }

    public function chargementViewlivres() {
        $req = $this->getBdd()->prepare("SELECT id, 
                                                       domaine,
                                                       auteur_id,
                                                       auteur,
                                                       titre,
                                                       serie,
                                                       num_serie, 
                                                       langue,
                                                       editeur,
                                                       format_livre,
                                                       an_edition,
                                                       proprietaire,
                                                       rangement,
                                                       pret,
                                                       cover,
                                                       a_lire,
                                                       est_lu,
                                                       commentaire
                                                FROM v_livre
                                                WHERE domaine <> 'BD'
                                                ORDER BY domaine, 
                                                         serie, 
                                                         num_serie");
        $req->execute();
        $mesViewlivres = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesViewlivres as $viewlivre) {
            $l = new Viewlivre($viewlivre['id'], 
                          $viewlivre['domaine'], 
                         $viewlivre['auteur_id'], 
                           $viewlivre['auteur'], 
                            $viewlivre['titre'],
                            $viewlivre['serie'],
                         $viewlivre['num_serie'],
                           $viewlivre['langue'],
                          $viewlivre['editeur'],
                      $viewlivre['format_livre'],
                        $viewlivre['an_edition'],
                     $viewlivre['proprietaire'],
                        $viewlivre['rangement'],
                             $viewlivre['pret'],
                            $viewlivre['cover'],
                            $viewlivre['a_lire'],
                            $viewlivre['est_lu'],
                      $viewlivre['commentaire']);
            $this->ajoutViewlivre($l);
        }
    }

    public function getViewlivreById($id) {
        for ($i = 0; $i < count($this->viewlivres); $i++) {
            if($this->viewlivres[$i]->getId() === $id) {
                return $this->viewlivres[$i];
            }
        }
        throw new Exception("Le livre n'existe pas.");
    }
}