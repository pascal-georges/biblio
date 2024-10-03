<?php
require_once "Model.class.php";
require_once "Livre.class.php";

class LivreManager extends Model {
    private $livres; // tableau de livres

    public function ajoutLivre($livre){
        $this->livres[] = $livre;
    }

    public function getLivres() {
        return $this->livres;
    }

    public function chargementLivres() {
        $req = $this->getBdd()->prepare("SELECT id, 
                                                       domaine,
                                                       auteur_id,
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
                                                FROM livre
                                                WHERE domaine <> 'BD'
                                                ORDER BY domaine, 
                                                         serie, 
                                                         num_serie");
        $req->execute();
        $mesLivres = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesLivres as $livre) {
            $l = new Livre($livre['id'], 
                           $livre['domaine'], 
                           $livre['auteur_id'], 
                           $livre['titre'],
                           $livre['serie'],
                           $livre['num_serie'],
                           $livre['langue'],
                           $livre['editeur'],
                           $livre['format_livre'],
                           $livre['an_edition'],
                           $livre['proprietaire'],
                           $livre['rangement'],
                           $livre['pret'],
                           $livre['cover'],
                           $livre['a_lire'],
                           $livre['est_lu'],
                           $livre['commentaire']);
            $this->ajoutLivre($l);
        }
    }

    public function getLivreById($id) {
        for ($i = 0; $i < count($this->livres); $i++) {
            if($this->livres[$i]->getId() === $id) {
                return $this->livres[$i];
            }
        }
        throw new Exception("Le livre n'existe pas.");
    }

    public function ajoutLivreBd($domaine, 
                                 $auteurId, 
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
        $req = "INSERT INTO livre (domaine,
                                   auteur_id,
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
                                   commentaire)
                VALUES (:domaine, 
                        :auteurId,
                        :titre, 
                        :serie,
                        :mumSerie,
                        :langue,
                        :editeur,
                        :formatLivre,
                        :anEdition,
                        :proprietaite,
                        :rangement,
                        :pret,
                        :cover,
                        :aLire,
                        :estLu,
                        :commentaire)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindvalue(":domaine", $domaine, PDO::PARAM_STR);
        $stmt->bindvalue(":auteurId", $auteurId, PDO::PARAM_INT);
        $stmt->bindvalue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindvalue(":serie", $serie, PDO::PARAM_STR);
        $stmt->bindvalue(":numSerie", $numSerie, PDO::PARAM_INT);
        $stmt->bindvalue(":langue", $langue, PDO::PARAM_STR);
        $stmt->bindvalue(":editeur", $editeur, PDO::PARAM_STR);
        $stmt->bindvalue(":formatLivre", $formatLivre, PDO::PARAM_STR);
        $stmt->bindvalue(":anEdition", $anEdition, PDO::PARAM_INT);
        $stmt->bindvalue(":proprietaire", $proprietaire, PDO::PARAM_STR);
        $stmt->bindvalue(":rangement", $rangement, PDO::PARAM_STR);
        $stmt->bindvalue(":pret", $pret, PDO::PARAM_STR);
        $stmt->bindvalue(":cover", $cover, PDO::PARAM_STR);
        $stmt->bindvalue(":aLire", $aLire, PDO::PARAM_INT);
        $stmt->bindvalue(":estLu", $estLu, PDO::PARAM_STR);
        $stmt->bindvalue(":commentaire", $commentaire, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $livre = new Livre($this->getBdd()->lastInsertId(), 
                               $domaine, 
                               $auteurId, 
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
                               $commentaire
                            );
            $this->ajoutLivre($livre);
        }
    }

    public function suppressionLivreBd($id) {
        $req = "DELETE FROM livre WHERE id = :idLivre";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idLivre", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $livre = $this->getLivreById($id);
            unset($livre);
        }
    }

    public function modificationLivreBd($id, 
                                        $domaine, 
                                        $auteurId, 
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
        $req = "UPDATE livre 
                SET domaine = :domaine, 
                    auteur_id = :auteurId, 
                    titre = :titre,
                    serie = :serie,
                    num_serie = :numSerie,
                    langue = :langue,
                    editeur = :editeur,
                    format_livre = :formatLivre,
                    an_edition = anEdition,
                    proprietaire 0 :proproetaire,
                    rangement = :rangement,
                    pret = :pret,
                    cover = :cover,
                    a_lire = :aLire,
                    est_lu = :estLu,
                    commentaire = :commentaire
                WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindvalue(":id", $id, PDO::PARAM_INT);
        $stmt->bindvalue(":domaine", $domaine, PDO::PARAM_STR);
        $stmt->bindvalue(":auteurId", $auteurId, PDO::PARAM_INT);
        $stmt->bindvalue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindvalue(":serie", $serie, PDO::PARAM_STR);
        $stmt->bindvalue(":numSerie", $numSerie, PDO::PARAM_STR);
        $stmt->bindvalue(":langue", $langue, PDO::PARAM_STR);
        $stmt->bindvalue(":editeur", $editeur, PDO::PARAM_STR);
        $stmt->bindvalue(":formatLivre", $formatLivre, PDO::PARAM_STR);
        $stmt->bindvalue(":anEdition", $anEdition, PDO::PARAM_STR);
        $stmt->bindvalue(":propriaire", $proprietaire, PDO::PARAM_STR);
        $stmt->bindvalue(":rangement", $rangement, PDO::PARAM_STR);
        $stmt->bindvalue(":pret", $pret, PDO::PARAM_STR);
        $stmt->bindvalue(":cover", $cover, PDO::PARAM_STR);
        $stmt->bindvalue(":aLire", $aLire, PDO::PARAM_STR);
        $stmt->bindvalue(":estLu", $estLu, PDO::PARAM_STR);
        $stmt->bindvalue(":commentaire", $commentaire, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $livre = $this->getLivreById($id)->setDomaine($domaine);
            $livre = $this->getLivreById($id)->setauteurId($auteurId);
            $livre = $this->getLivreById($id)->setTitre($titre);
            $livre = $this->getLivreById($id)->setSerie($serie);
            $livre = $this->getLivreById($id)->setNumSerie($numSerie);
            $livre = $this->getLivreById($id)->setLangue($langue);
            $livre = $this->getLivreById($id)->setEditeur($editeur);
            $livre = $this->getLivreById($id)->setFormatLivre($formatLivre);
            $livre = $this->getLivreById($id)->setAnEdition($anEdition);
            $livre = $this->getLivreById($id)->setProprietaire($proprietaire);
            $livre = $this->getLivreById($id)->setRangement($rangement);
            $livre = $this->getLivreById($id)->setPret($pret);
            $livre = $this->getLivreById($id)->setCover($cover);
            $livre = $this->getLivreById($id)->setALire($aLire);
            $livre = $this->getLivreById($id)->setEstLu($estLu);
            $livre = $this->getLivreById($id)->setCommentaire($commentaire);
        }
    }
}