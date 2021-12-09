<?php

//api.prosygma-cm.com/famillesarts/ => api.prosygma-cm.com/index.php?demande=famillesarts
//api.prosygma-cm.com/famillesarts/:code
//api.prosygma-cm.com/famillesarts/:nom
//api.prosygma-cm.com/{autre}/:id

require_once("./api.php");

/********************************************************
 * METHODE GET : READ
 ********************************************************/

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    if (!empty($_GET['demande'])) {


        // $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        $url = explode("/", filter_var($_GET['demande']));
        //print_r($url[0]);
        // FAMILLES ARTICLES
        if ($url[0] == "famillesarts") {
            if (empty($url[1])) {
                getAllfamilleArticles();
            } else {
                if (ctype_digit($url[1])) {
                    getFamillesarticlesById($url[1]);
                } else {
                    getFamillesarticlesBycodeORbyName($url[1]);
                }
            }
        }
        // MAGASINS
        if ($url[0] == "magasins") {
            // print_r($url[0]);
            if (empty($url[1])) {
                getAllMagasin();
            } else {

                if (ctype_digit($url[1])) {
                    getMagasinByID($url[1]);
                } else {

                    getMagasinBycodeORbyName($url[1]);
                }
            }
        }
        // CATEGORIES ARTICLES
        if ($url[0] == "categories") {
            if (empty($url[1])) {
                getAllCategorie();
            } else {

                if (ctype_digit($url[1])) {
                    getCategorieByID($url[1]);
                } else {

                    getCategoieBycodeORbyName($url[1]);
                }
            }
        }
        // RAYONS ARTICLE
        if ($url[0] == "rayons") {
            if (empty($url[1])) {
                getAllRayon();
            } else {

                if (ctype_digit($url[1])) {
                    getRayonByID($url[1]);
                } else {

                    getRayonBycodeORbyName($url[1]);
                }
            }
        }
        // SOUS FAMILLE ARTICLES
        if ($url[0] == "sfamilles") {
            if (empty($url[1])) {
                getAllSFamille();
            } else {

                if (ctype_digit($url[1])) {
                    getSFamilleByID($url[1]);
                } else {

                    getSFamilleBycodeORbyName($url[1]);
                }
            }
        }
        // REFERENCES ARTICLES
        if ($url[0] == "refarticle") {
            if (empty($url[1])) {
                getAllRefArticle();
            } else {

                if (ctype_digit($url[1])) {
                    getRefArticleByID($url[1]);
                } else {

                    getRefArticleBycode($url[1]);
                }
            }
        }
        // CLIENTS
        if ($url[0] == "clients") {
            if (empty($url[1])) {
                getAllClient();
            } else {

                if (ctype_digit($url[1])) {
                    getClientByID($url[1]);
                } else {

                    getClientBycodeORbyName($url[1]);
                }
            }
        }
        // TYPE DE CONDITIONNEMENT
        if ($url[0] == "typconditionnement") {
            if (empty($url[1])) {
                getAllTypecondi();
            } else {

                if (ctype_digit($url[1])) {
                    getTypecondiByID($url[1]);
                } else {

                    getTypecondiBycode($url[1]);
                }
            }
        }
        // CONDITIONNEMENTS
        if ($url[0] == "conditionnement") {
            if (empty($url[1])) {
                getAllConditionnement();
            } else {

                if (ctype_digit($url[1])) {
                    getConditionnementByID($url[1]);
                } else {

                    getConditionnementBycodeORbyName($url[1]);
                }
            }
        }
        // FOURNISSEURS
        if ($url[0] == "fournisseurs") {
            if (empty($url[1])) {
                getAllFournisseur();
            } else {

                if (is_int($url[1])) {
                    getFournisseurByID($url[1]);
                } else {

                    getFournisseurBycodeORbyName($url[1]);
                }
            }
        }
        // REFRENECE FOURNISSEURS
        if ($url[0] == "reffournisseurs") {
            if (empty($url[1])) {
                getAllRefFournisseur();
            } else {

                if (ctype_digit($url[1])) {
                    getRefFournisseurByID($url[1]);
                } else {

                    getRefFournisseurBycode($url[1]);
                }
            }
        }
        // CLIENT ETAT
        if ($url[0] == "cltetat") {
            if (empty($url[1])) {
                getAllCltEtat();
            } else {

                if (ctype_digit($url[1])) {
                    getCltEtatByID($url[1]);
                } else {

                    getCltEtatBycodeORbyName($url[1]);
                }
            }
        }
        // FOURNISSEUR ETAT
        if ($url[0] == "fouretat") {
            if (empty($url[1])) {
                getAllFourEtat();
            } else {

                if (ctype_digit($url[1])) {
                    getFourEtatByID($url[1]);
                } else {
                    getFourEtatBycodeORbyName($url[1]);
                }
            }
        }
    } else {
        // Aucune demande effectuee 
        $erreur["statut"] = False;
        $erreur["message"] = "l'url ne peut etre vide";
        echo json_encode($erreur);
    }

    /******************************************************
     *  METHODE POST : CREATE
     ******************************************************/
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //  Formatqge de l'URL
    $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));

    /**
     * CREATE MAGASIN
     * @
     */
    if ($url[0] == "magasins") {
        createMagasin($_POST["codemag"], $_POST["desigmag"]);
    }
    /**
     * CREATE CATEGORIE
     * @
     */
    if ($url[0] == "categories") {
        createCategorie($_POST["codecat"], $_POST["desigcat"]);
    }
    /**
     * CREATE RAYON
     * @
     */
    if ($url[0] == "rayons") {
        createRayon($_POST["idmag"], $_POST["coderay"], $_POST["desigray"]);
    }
    /**
     * CREATE SOUS FAMILLE
     * @
     */
    if ($url[0] == "sfamilles") {
        createSFamille($_POST["idfam"], $_POST["idmag"], $_POST["codesfam"], $_POST["desigsfam"]);
    }
    /**
     * CREATE FAMILLE
     * @
     */
    if ($url[0] == "famillesarts") {
        createFamille($_POST["codefam"], $_POST["desigfam"], $_POST["valorisation"]);
    }
    /**
     * CREATE REFERENCE ARTICLE
     * @
     */
    if ($url[0] == "refarticle") {
        createRefArticle($_POST["coderef_art"], $_POST["prixref_art"]);
    }
    /**
     * CREATE MAGASIN
     * @
     */
    if ($url[0] == "clients") {
        createClient($_POST["codeclt"], $_POST["desigclt"], $_POST["telclt"], $_POST["villeclt"], $_POST["paysclt"]);
    }
    /**
     * CREATE TYPE DE CONDITIONNEMENT
     * @
     */
    if ($url[0] == "typconditionnement") {
        createTypeCondi($_POST["idcond"], $_POST["codetype_cond"], $_POST["nbrunit_typecond"]);
    }
    /**
     * CREATE CONDITIONNEMENT
     * @
     */
    if ($url[0] == "conditionnement") {
        createConditionnement($_POST["codecond"], $_POST["desigcond"], $_POST["unitcond"]);
    }
    /**
     * CREATE FOURNISSEURS
     * @
     */
    if ($url[0] == "fournisseurs") {
        createFournisseur($_POST["codefour"], $_POST["desigfour"], $_POST["fourtype"], $_POST["telfour"], $_POST["villefour"], $_POST["paysfour"], $_POST["bpfour"], $_POST["adrfour"]);
    }
    /**
     * CREATE REFERENCE FOURNISSEUR
     * @
     */
    if ($url[0] == "reffournisseurs") {
        createRefFournisseur($_POST["idfour"], $_POST["idref_art"], $_POST["coderef_four"], $_POST["prix"]);
    }
    /**
     * CREATE CLIENT ETAT
     * @
     */
    if ($url[0] == "cltetat") {
        if (!empty(basename($_FILES['img']['tmp_name']))) {

            $file_img = $fichier_temp = basename($_FILES['img']['tmp_name']);
        } else {
            $file_img = "";
        }
        createClientEtat($_POST["idclt"], $_POST["codeclt_etat"], $_POST["desigclt_etat"], $_POST["validclt_etat"], $_POST["dateclt_emis"], $_POST["dateclt_exp"], $file_img);
    }
    /**
     * CREATE FOURNISSUER ETAT
     * @
     */
    if ($url[0] == "fouretat") {

        $fichier_temp = basename($_FILES['img']['tmp_name']);
        if (!empty($fichier_temp)) {
            $file_img = $fichier_temp;
        } else {
            $file_img = "";
        }
        createFourEtat($_POST["idfour"], $_POST["codefour_etat"], $_POST["desigfour_etat"], $_POST["validfour_etat"], $_POST["date_emis"], $_POST["date_exp"], $file_img);
    }
    /******************************************************
     *  METHODE DELETE : DELETE
     ******************************************************/
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));
    /**
     * DELETE MAGASIN
     * @
     */
    if ($url[0] == "magasins") {
        deleteMagasin($url[1]);
    }
    /**
     * DELETE CATEGORIE
     * @
     */
    if ($url[0] == "categories") {
        deleteCategorie($url[1]);
    }
    /**
     * DELETE RAYON 
     * @
     */
    if ($url[0] == "rayons") {
        deleteRayon($url[1]);
    }
    /**
     * DELETE SOUS FAMILLE
     * @
     */
    if ($url[0] == "sfamilles") {
        deleteSFamille($url[1]);
    }
    /**
     * DELETE FAMILLE
     * @
     */
    if ($url[0] == "famillesarts") {
        deleteFamille($url[1]);
    }
    /**
     * DELETE REFERENCE ARTICLE
     * @
     */
    if ($url[0] == "refarticle") {
        deleteRefArticle($url[1]);
    }
    /**
     * DELETE CLIENTS
     * @
     */
    if ($url[0] == "clients") {
        deleteClient($url[1]);
    }
    /**
     * DELETE TYPE DE CONDITIONNEMENT
     * @
     */
    if ($url[0] == "typconditionnement") {
        deleteTypeCondi($url[1]);
    }
    /**
     * DELETE CONDITIONNEMENT
     * @
     */
    if ($url[0] == "conditionnement") {
        deleteConditionnement($url[1]);
    }
    /**
     * DELETE FOURNISSEURS
     * @
     */
    if ($url[0] == "fournisseurs") {
        deleteFournisseur($url[1]);
    }
    /**
     * DELETE REFERENCE FORUNISSEURS
     * @
     */
    if ($url[0] == "reffournisseurs") {
        deleteRefFournisseur($url[1]);
    }
    /**
     * DELETE CLIENT ETAT
     * @
     */
    if ($url[0] == "cltetat") {
        deleteClientEtat($url[1]);
    }
    /**
     * DELETE FOURNISSUER ETAT
     * @
     */
    if ($url[0] == "fouretat") {
        deleteFourEtat($url[1]);
    }
    /******************************************************
     *  METHODE PUT : PUT
     ******************************************************/
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));
    /**
     * MAGASIN
     * @
     */
    if ($url[0] == "magasins") {
        updateMagasin($url[1]);
    }
    /**
     * CATEGORIE
     * @
     */
    if ($url[0] == "categories") {
        updateCategorie($url[1]);
    }
    /**
     * RAYON
     * @
     */
    if ($url[0] == "rayons") {
        updateRayon($url[1]);
    }
    /**
     * SOUS FAMILLE
     * @
     */
    if ($url[0] == "sfamilles") {
        updateSFamille($url[1]);
    }
    /**
     *  FAMILLE 
     * @
     */
    if ($url[0] == "famillesarts") {
        updateFamille($url[1]);
    }
    /**
     * REFERENCE ARTICLE
     * @
     */
    if ($url[0] == "refarticle") {
        updateRefArticle($url[1]);
    }
    /**
     * CLIENTS
     * @
     */
    if ($url[0] == "clients") {
        updateClient($url[1]);
    }
    /**
     * TYPE DE CONDITIONNEMENT
     * @
     */
    if ($url[0] == "typconditionnement") {
        updateTypeCondi($url[1]);
    }
    /**
     * CONDITIONNEMENT
     * @
     */
    if ($url[0] == "conditionnement") {
        updateConditionnement($url[1]);
    }
    /**
     * FOURNISSEURS
     * @
     */
    if ($url[0] == "fournisseurs") {
        updateFournisseur($url[1]);
    }
    /**
     * REFERENCE FOURNISSEUR
     * @
     */
    if ($url[0] == "reffournisseurs") {
        updateRefFournisseur($url[1]);
    }
    /**
     * CLIENT ETAT
     * @
     */
    if ($url[0] == "cltetat") {
        updateClientEtat($url[1]);
    }
    /**
     * CLIENT FOURNISSEUR ETAT
     * @
     */
    if ($url[0] == "fouretat") {
        updateFourEtat($url[1]);
    }
} else {
    // SI METHODE NON APPROPRIEE
    $erreur["statut"] = False;
    $erreur["message"] = "La méthode n'est pas autorisée";
    echo json_encode($erreur);
}
