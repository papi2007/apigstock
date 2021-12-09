<?php
require_once('config/database.php');
require_once('config/jsonheader.php');
require_once('uploadfile.php');

/********************************************************
 *  READ by GET METHODE
 ********************************************************/

/**
 * Afficher toutes les  famille d'articles
 *
 * @return void
 */
function getAllfamilleArticles()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM  famillearticle";
    $stmt = $pdo->prepare($req);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Liste de famille d'article";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
/**
 * Affiche un article en fonction du code de l'article donne en parametre
 *
 * @param  string $codefam (Ex. Art01)
 * @return void
 */
function getFamillesarticlesBycode($codefam)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM famillearticle WHERE codefam = :codefam";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codefam", $codefam);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Famille d'article";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
/**
 * Affiche un article en fonction du Nom de l'article donne en parametre
 *
 * @param  string $codesigfam (Ex. Article1)
 * @return void
 */
function getFamillesarticlesByname($codesigfam)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM famillearticle WHERE codesigfam = :codesigfam";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codesigfam", $codesigfam, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Famille d'article";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getFamillesarticlesBycodeORbyName($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM famillearticle WHERE codefam = :codefam OR desigfam= :desigfam ";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codefam", $value, PDO::PARAM_STR);
    $stmt->bindValue(":desigfam", $value, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Famille d'article";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getFamillesarticlesById($idfam)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM famillearticle where idfam = :idfam";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idfam", $idfam);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Famille d'article";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
/**
 * Retourne  la liste des magasin
 *
 * @return void
 */
function getAllMagasin()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM  magasin";
    $stmt = $pdo->prepare($req);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Liste des magasins";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getMagasinBycodeORbyName($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM magasin WHERE codemag = :codemag OR desigmag= :desigmag ";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codemag", $value);
    $stmt->bindValue(":desigmag", $value);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Magasin ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getMagasinById($idmag)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM magasin where idmag = :idmag";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idmag", $idmag);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Magasin ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END MAGASIN

// DEBUT CATEGORIE
function getAllCategorie()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM  categorie";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Liste des categories ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getCategoieBycodeORbyName($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM categorie WHERE codecat = :codecat OR desigcat= :desigcat ";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codecat", $value);
    $stmt->bindValue(":desigcat", $value);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Categorie ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getCategorieById($idcat)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM categorie where idcat = :idcat";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idcat", $idcat);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Categorie ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END CATEGORIE

// DEBUT RAYON
function getAllRayon()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM  rayon";
    $stmt = $pdo->prepare($req);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Liste de Rayons ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getRayonBycodeORbyName($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM rayon WHERE coderay = :coderay OR desigray= :desigray ";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":coderay", $value, PDO::PARAM_STR);
    $stmt->bindValue(":desigray", $value, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Rayon ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getRayonById($idray)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM rayon where idray = :idray";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idray", $idray, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Rayon ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END RAYON

// DEBUT SOUS FAMILLE
function getAllSFamille()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM  sousfamille";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Liste de sous familles ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getSFamilleBycodeORbyName($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM sousfamille WHERE codesfam = :codesfam OR desigsfam= :desigsfam ";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codesfam", $value, PDO::PARAM_STR);
    $stmt->bindValue(":desigsfam", $value, PDO::PARAM_STR);
    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $nbre = $stmt->rowCount();

    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Sous famille ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getSFamilleById($idsfam)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM sousfamille where idsfam = :idsfam";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idsfam", $idsfam, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Sous famille ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END SOUS FAMILLE

// DEBUT REF ARTICLE
function getAllRefArticle()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM  ref_article";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "References Articles ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getRefArticleBycode($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM ref_article WHERE coderef_art = :coderef_art";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":coderef_art", $value);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Reference article ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getRefArticleById($idref_art)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM ref_article where idref_art = :idref_art";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idref_art", $idref_art);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Reference article ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END SOUS REF ARTICLE


// DEBUT CLIENTS
function getAllClient()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM  client";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Liste des clients ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getClientBycode($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM client WHERE codeclt = :codeclt";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codeclt", $value);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Client ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getClientBycodeORbyName($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM client WHERE codeclt = :codeclt OR desigclt= :desigclt ";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codeclt", $value);
    $stmt->bindValue(":desigclt", $value);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Client ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getClientById($idclt)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM client where idclt = :idclt";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idclt", $idclt);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Client ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END CLIENTS


// DEBUT TYPE CONDITIONNEMENT
function getAllTypecondi()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM   type_conditionnement";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Les Types de conditionnements ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getTypecondiBycode($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM  type_conditionnement WHERE codetype_cond = :codetype_cond";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codetype_cond", $value);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Type de conditionnement ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}

function getTypecondiById($idtype_cond)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM type_conditionnement where idtype_cond = :idtype_cond";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idtype_cond", $idtype_cond);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Type de conditionnement ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END TYPE DE CONDIONNEMENT

// DEBUT CONDITIONNEMENT
function getAllConditionnement()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM   conditionnement";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Les conditionnements ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getConditionnementBycodeORbyName($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM conditionnement WHERE codecond = :codecond OR desigcond= :desigcond ";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codecond", $value);
    $stmt->bindValue(":desigcond", $value);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Conditionnement ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}

function getConditionnementById($idcond)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM conditionnement where idcond = :idcond";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idcond", $idcond);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Conditionnement ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END CONDIONNEMENT

// DEBUT FOURNISSEUR
function getAllFournisseur()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM   fournisseur";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Liste des fournisseurs ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getFournisseurBycodeORbyName($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM fournisseur WHERE codefour = :codefour  OR desigfour= :desigfour";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codefour", $value);
    $stmt->bindValue(":desigfour", $value);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Fournisseur ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}

function getFournisseurById($idfour)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM fournisseur where idfour = :idfour";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idfour", $idfour);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Fournisseur ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END FOURNISSEUR

// DEBUT REFERENCE FOURNISSEUR
function getAllRefFournisseur()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM   ref_fournisseur";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Liste des references Fournisseurs ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getRefFournisseurBycode($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM ref_fournisseur WHERE coderef_four = :coderef_four";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":coderef_four", $value);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Reference Fournisseur ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}

function getRefFournisseurById($idref_four)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM ref_fournisseur where idref_four = :idref_four";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idref_four", $idref_four);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Reference Fournisseur ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END REF FOURNISSEUR

// DEBUT CLIENT ETAT
function getAllCltEtat()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM   client_etat";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Clients Etats ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getCltEtatBycodeORbyName($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM client_etat WHERE codeclt_etat = :codeclt_etat  OR desigclt_etat= :desigclt_etat";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codeclt_etat", $value);
    $stmt->bindValue(":desigclt_etat", $value);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Client Etat ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getCltEtatById($idclt_etat)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM client_etat where idclt_etat = :idclt_etat";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idclt_etat", $idclt_etat);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Client Etat ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END CLIENT ETAT


// DEBUT FOURNISSEUR ETAT
function getAllFourEtat()
{
    $pdo = getConnexion();
    $req = "SELECT * FROM fournisseur_etat ";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Etat fournisseur ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getFourEtatBycodeORbyName($value)
{
    $pdo = getConnexion();
    $req = "SELECT * FROM fournisseur_etat WHERE codefour_etat = :codefour_etat  OR desigfour_etat= :desigfour_etat";

    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":codefour_etat", $value);
    $stmt->bindValue(":desigfour_etat", $value);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Etat fournisseur ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
function getFourEtatById($idfour_etat)
{

    $pdo = getConnexion();
    $req = "SELECT * FROM  fournisseur_etat where idfour_etat = :idfour_etat";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idfour_etat", $idfour_etat);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {

        $tab_retour["statut"] = True;
        $tab_retour["Message"] = "Etats Fournisseurs ";
        $tab_retour["Nombre"] = $stmt->rowCount();
        $tab_retour["resutats"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $tab_retour["statut"] = False;
        $tab_retour["Message"] = "Aucune donnee disponible";
        $tab_retour["Nombre"] = $stmt->rowCount();
    }
    $stmt->closeCursor();
    sendJSON($tab_retour);
}
// END FOURNISSEUR ETAT

/*************************************************************************************
 * 
 * END READ FUNCTIONS
 *
 * 
 ***************************************************************************************/
/****************** */
//
/****************** */


/**
 * 
 * POST
 *
 */


/**
 * CREATE MAGASIN
 *
 */
function createMagasin($codemag, $desigmag)
{
    $pdo = getConnexion();

    if (!empty($_POST['codemag']) && !empty($_POST['desigmag'])) {


        // Creation de la requete
        $req = "INSERT INTO magasin (idmag,codemag, desigmag) value(NULL, :codemag,:desigmag)";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':codemag', $codemag);
        $stmt->bindParam(':desigmag', $desigmag);

        // Execution de la requete
        $stmt->execute();

        if ($stmt) {

            $tab_retour["statut"] = True;
            $tab_retour["Message"] = "Enregistrement effectue avec succes";
        } else {

            $tab_retour["statut"] = False;
            $tab_retour["Message"] = "Echec lors de l'enregistrement, essayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE
 * 
 */

/**
 * DELETE MAGASIN
 *
 */
function deleteMagasin($idmag)
{
    $pdo = getConnexion();

    if (!empty($idmag)) {


        // Creation de la requete
        $req = "DELETE FROM magasin WHERE idmag = :idmag";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idmag', $idmag);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {

            $tab_retour["statut"] = True;
            $tab_retour["Message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = False;
            $tab_retour["Message"] = "Echec de l'operation, verifiez que cete entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END DELETE
 * 
 */


/**
 * UPDATE MAGASIN
 *
 */
function updateMagasin($idmag)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    $codemag = $donnees->codemag;
    $desigmag = $donnees->desigmag;
    $dateupdate = date('Y-m-d H:i:s');
    if (!empty($desigmag) && !empty($codemag) && !empty($idmag)) {

        // Creation de la requete
        $req = "UPDATE magasin SET codemag = :codemag, desigmag = :desigmag , dateupdate = :dateupdate WHERE idmag = :idmag";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idmag', $idmag);
        $stmt->bindParam(':codemag', $codemag);
        $stmt->bindParam(':desigmag', $desigmag);
        $stmt->bindParam(':dateupdate', $dateupdate);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement mis a jour avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END UPDATE
 * 
 */


/************************************************************************************
 * 
 * CREATE CATEGORIE
 *
 *************************************************************************************/
function createCategorie($codecat, $desigcat)
{
    $pdo = getConnexion();

    if (!empty($_POST['codecat']) && !empty($_POST['desigcat'])) {


        // Creation de la requete
        $req = "INSERT INTO categorie (idcat,codecat, desigcat) value(NULL, :codecat,:desigcat)";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':codecat', $codecat);
        $stmt->bindParam(':desigcat', $desigcat);

        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement effectue avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec lors de la creation, essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE CATEGORIE
 * 
 */

/**
 * DELETE CATEGORIE
 *
 */
function deleteCategorie($idcat)
{
    $pdo = getConnexion();

    if (!empty($idcat)) {


        // Creation de la requete
        $req = "DELETE FROM categorie WHERE idcat = :idcat";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idcat', $idcat);
        // Execution de la requete
        $stmt->execute();
        // Retourne le nombre de ligne
        $nbre = $stmt->rowCount();


        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cete entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END DELETE CATEGORIE
 * 
 */


/**
 * UPDATE CATEGORIE
 *
 */
function updateCategorie($idcat)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    $codecat = $donnees->codecat;
    $desigcat = $donnees->desigcat;
    $dateupdate = date('Y-m-d H:i:s');
    if (!empty($desigcat) && !empty($codecat) && !empty($idcat)) {

        // Creation de la requete
        $req = "UPDATE categorie SET codecat = :codecat, desigcat = :desigcat , dateupdate = :dateupdate WHERE idcat = :idcat";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idcat', $idcat);
        $stmt->bindParam(':codecat', $codecat);
        $stmt->bindParam(':desigcat', $desigcat);
        $stmt->bindParam(':dateupdate', $dateupdate);
        // Execution de la requete
        $stmt->execute();
        // Retourne le nombre de ligne


        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement mis a jour avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }

    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE CATEGORIE
 * 
 */


/************************************************************************************
 * 
 * CREATE RAYON
 *
 *************************************************************************************/
function createRayon($idmag, $coderay, $desigray)
{
    $pdo = getConnexion();

    if (!empty($_POST['coderay']) && !empty($_POST['desigray']) && !empty($_POST['idmag'])) {


        // Creation de la requete
        $req = "INSERT INTO rayon (idray,idmag,coderay,desigray) value(NULL, :idmag, :coderay, :desigray)";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idmag', $idmag);
        $stmt->bindParam(':coderay', $coderay);
        $stmt->bindParam(':desigray', $desigray);

        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement effectue avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cete entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE RAYON
 * 
 */

/**
 * DELETE RAYON
 *
 */
function deleteRayon($idray)
{
    $pdo = getConnexion();

    if (!empty($idray)) {

        // Creation de la requete
        $req = "DELETE FROM rayon WHERE idray = :idray";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idray', $idray);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cete entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END DELETE RAYON
 * 
 */


/**
 * UPDATE RAYON
 *
 */
function updateRayon($idray)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    $coderay = $donnees->coderay;
    $desigray = $donnees->desigray;
    $idmag = $donnees->idmag;
    $dateupdate = date('Y-m-d H:i:s');
    if (!empty($desigray) && !empty($coderay) && !empty($idmag)) {

        // Creation de la requete
        $req = "UPDATE rayon SET coderay = :coderay, idmag = :idmag , desigray = :desigray, dateupdate = :dateupdate WHERE idray = :idray";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idray', $idray);
        $stmt->bindParam(':idmag', $idmag);
        $stmt->bindParam(':coderay', $coderay);
        $stmt->bindParam(':desigray', $desigray);
        $stmt->bindParam(':dateupdate', $dateupdate);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement mis a jour avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE RAYON
 * 
 */

/************************************************************************************
 * 
 * CREATE SOUS FAMILLES : champs idsfam, idfam, idmag, codesfam, desigsfam, datecreate, dateupdate 
 *
 *************************************************************************************/
function createSFamille($idfam, $idmag, $codesfam, $desigsfam)
{
    $pdo = getConnexion();

    if (!empty($_POST['idfam']) && !empty($_POST['codesfam'])  && !empty($_POST['desigsfam'])) {


        // Creation de la requete
        //$req = "INSERT INTO sousfamille  (idsfam, idfam, idmag, codesfam, desigsfam) value(NULL, :idfam, :idmag, :codesfam, :desigsfam)";
        $req = "INSERT INTO sousfamille  (idsfam, idfam, codesfam, desigsfam) value(NULL, :idfam, :codesfam, :desigsfam)";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idfam', $idfam);
       // $stmt->bindParam(':idmag', $idmag);
        $stmt->bindParam(':codesfam', $codesfam);
        $stmt->bindParam(':desigsfam', $desigsfam);

        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement effectue avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de l'enregistrement, essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE SOUS FAMILLE
 * 
 */

/**
 * DELETE SOUS FAMILLE
 *
 */
function deleteSFamille($idsfam)
{
    $pdo = getConnexion();

    if (!empty($idsfam)) {


        // Creation de la requete
        $req = "DELETE FROM sousfamille WHERE idsfam = :idsfam";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idsfam', $idsfam);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cete entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END DELETE SOUS FAMILLE
 * 
 */


/**
 * UPDATE SOUS FAMILLE champs idsfam, idfam, idmag, codesfam, desigsfam
 *
 */
function updateSFamille($idsfam)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    // Recuperation des variables
    $idfam = $donnees->idfam;
    $idmag = $donnees->idmag;
    $codesfam = $donnees->codesfam;
    $desigsfam = $donnees->desigsfam;
    $dateupdate = date('Y-m-d H:i:s');

    if (!empty($idfam) && !empty($codesfam) && !empty($desigsfam)) {

        // Creation de la requete
        $req = "UPDATE sousfamille SET codesfam = :codesfam, idfam = :idfam, desigsfam = :desigsfam, dateupdate = :dateupdate WHERE idsfam = :idsfam";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idsfam', $idsfam);
        $stmt->bindParam(':idfam', $idfam);
        //$stmt->bindParam(':idmag', $idmag);
        $stmt->bindParam(':codesfam', $codesfam);
        $stmt->bindParam(':desigsfam', $desigsfam);
        $stmt->bindParam(':dateupdate', $dateupdate);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement mis a jour avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }

    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE SOUS FAMILLE
 * 
 */


/************************************************************************************
 * 
 * CREATE FAMILLES : champs idfam, codefam, desigfam, valorisation, datecreate, dateupdate 
 *
 *************************************************************************************/
function createFamille($codefam, $desigfam, $valorisation)
{
    $pdo = getConnexion();

    if (!empty($_POST['codefam']) && !empty($_POST['desigfam'])  && !empty($_POST['valorisation'])) {


        // Creation de la requete
        $req = "INSERT INTO famillearticle  (idfam, codefam, desigfam, valorisation) value(NULL, :codefam, :desigfam, :valorisation)";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':valorisation', $valorisation);
        $stmt->bindParam(':codefam', $codefam);
        $stmt->bindParam(':desigfam', $desigfam);

        // Execution de la requete
        $stmt->execute();
        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement effectue avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE FAMILLE
 * 
 */

/**
 * DELETE FAMILLE
 *
 */
function deleteFamille($idfam)
{
    $pdo = getConnexion();

    if (!empty($idfam)) {


        // Creation de la requete
        $req = "DELETE FROM famillearticle WHERE idfam = :idfam";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idfam', $idfam);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cete entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END DELETE FAMILLE
 * 
 */


/**
 * UPDATE FAMILLE champs idfam, codefam, desigfam, valorisation
 *
 */
function updateFamille($idfam)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    // Recuperation des variables
    $codefam = $donnees->codefam;
    $desigfam = $donnees->desigfam;
    $valorisation = $donnees->valorisation;
    $dateupdate = date('Y-m-d H:i:s');

    if (!empty($codefam) && !empty($valorisation) && !empty($desigfam)) {

        // Creation de la requete
        $req = "UPDATE famillearticle SET codefam = :codefam, valorisation = :valorisation, desigfam = :desigfam, dateupdate = :dateupdate WHERE idfam = :idfam";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idfam', $idfam);
        $stmt->bindParam(':valorisation', $valorisation);
        $stmt->bindParam(':codefam', $codefam);
        $stmt->bindParam(':desigfam', $desigfam);
        $stmt->bindParam(':dateupdate', $dateupdate);
        // Execution de la requete
        $stmt->execute();
        // Retourne le nombre de ligne
        $nbre = $stmt->rowCount();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement mis a jour avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }

    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE FAMILLE
 * 
 */


/************************************************************************************
 * 
 * CREATE REF ARTICLE : champs idref_art, coderef_art, prixref_art, datecreate, dateupdate 
 *
 *************************************************************************************/
function createRefArticle($coderef_art, $prixref_art)
{
    $pdo = getConnexion();

    if (!empty($_POST['coderef_art']) && !empty($_POST['prixref_art'])) {

        if (is_numeric($prixref_art)) {

            // Creation de la requete
            $req = "INSERT INTO ref_article (idref_art, coderef_art, prixref_art) value(NULL, :coderef_art, :prixref_art)";
            // Attribution de la valeur post
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':coderef_art', $coderef_art);
            $stmt->bindParam(':prixref_art', $prixref_art);

            // Execution de la requete
            $stmt->execute();

            if ($stmt) {
                $tab_retour["statut"] = true;
                $tab_retour["message"] = "Enregistrement effectue avec succes";
            } else {
                // Tous les Champs sont vides
                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
            }
        } else {

            // Le prix mal renseigne
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Verifiez la valeur du prix indique";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE REF ARTICLE
 * 
 */

/**
 * DELETE refrence article
 *
 */
function deleteRefArticle($idref_art)
{
    $pdo = getConnexion();

    if (!empty($idref_art)) {


        // Creation de la requete
        $req = "DELETE FROM ref_article WHERE idref_art = :idref_art";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idref_art', $idref_art);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cete entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}
/**
 * 
 * END DELETE REF ARTICLE
 * 
 */

/**
 * UPDATE REF ARTICLE 
 *
 */
function updateRefArticle($idref_art)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    // Recuperation des variables
    $coderef_art = $donnees->coderef_art;
    $prixref_art = $donnees->prixref_art;
    $dateupdate = date('Y-m-d H:i:s');

    if (!empty($coderef_art) && !empty($prixref_art)) {

        if (is_numeric($prixref_art)) {

            // Creation de la requete
            $req = "UPDATE ref_article SET coderef_art = :coderef_art, prixref_art = :prixref_art, dateupdate = :dateupdate WHERE idref_art = :idref_art";
            // Attribution de la valeur post
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':idref_art', $idref_art);
            $stmt->bindParam(':coderef_art', $coderef_art);
            $stmt->bindParam(':prixref_art', $prixref_art);
            $stmt->bindParam(':dateupdate', $dateupdate);
            // Execution de la requete
            $stmt->execute();
            // Retourne le nombre de ligne


            if ($stmt) {
                $tab_retour["statut"] = true;
                $tab_retour["message"] = "Enregistrement mis a jour avec succes";
            } else {
                // Tous les Champs sont vides
                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
            }
        } else {

            // Le prix mal renseigne
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Verifiez la valeur du prix indique";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }

    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE REF ARTICLE
 * 
 */

/************************************************************************************
 * 
 * CREATE CLIENTS : champs  	idclt, codeclt, desigclt, telclt, villeclt, paysclt 
 *
 *************************************************************************************/
function createClient($codeclt, $desigclt, $telclt, $villeclt, $paysclt)
{
    $pdo = getConnexion();

    if (!empty($_POST['codeclt']) && !empty($_POST['desigclt'])  && !empty($_POST['telclt'])  && !empty($_POST['villeclt']) && !empty($_POST['villeclt'])) {

        // Creation de la requete
        $req = "INSERT INTO client  (idclt, codeclt, desigclt, telclt, villeclt, paysclt) value(NULL, :codeclt, :desigclt, :telclt, :villeclt, :paysclt)";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':codeclt', $codeclt);
        $stmt->bindParam(':desigclt', $desigclt);
        $stmt->bindParam(':telclt', $telclt);
        $stmt->bindParam(':villeclt', $villeclt);
        $stmt->bindParam(':paysclt', $paysclt);

        // Execution de la requete
        $stmt->execute();
        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement effectue avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE CLIENTS
 * 
 */

/**
 * DELETE CLIENTS
 *
 */
function deleteClient($idclt)
{
    $pdo = getConnexion();

    if (!empty($idclt)) {


        // Creation de la requete
        $req = "DELETE FROM client WHERE idclt = :idclt";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idclt', $idclt);
        // Execution de la requete
        $stmt->execute();


        if ($stmt) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cette entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}
/**
 * 
 * END DELETE CLIENT
 * 
 */

/**
 * UPDATE CLIENTS
 *
 */
function updateClient($idclt)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    // Recuperation des variables
    $codeclt = $donnees->codeclt;
    $desigclt = $donnees->desigclt;
    $villeclt = $donnees->villeclt;
    $telclt = $donnees->telclt;
    $paysclt = $donnees->paysclt;
    $dateupdate = date('Y-m-d H:i:s');

    if (!empty($codeclt) && !empty($desigclt) && !empty($villeclt) && !empty($telclt) && !empty($paysclt)) {

        // Creation de la requete
        $req = "UPDATE client SET codeclt = :codeclt, desigclt = :desigclt, telclt = :telclt, villeclt = :villeclt,  paysclt = :paysclt, dateupdate = :dateupdate WHERE idclt = :idclt";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idclt', $idclt);
        $stmt->bindParam(':codeclt', $codeclt);
        $stmt->bindParam(':desigclt', $desigclt);
        $stmt->bindParam(':telclt', $telclt);
        $stmt->bindParam(':villeclt', $villeclt);
        $stmt->bindParam(':paysclt', $paysclt);
        $stmt->bindParam(':dateupdate', $dateupdate);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement mis a jour avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }

    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE CLIENTS
 * 
 */


/************************************************************************************
 * 
 * CREATE TYPE CONDITIONNEMENT : 
 * champs  idtype_cond, idcond[FK], codetype_cond, nbrunit_typecond, datecreate, dateupdate, 
 *
 *************************************************************************************/
function createTypeCondi($idcond, $codetype_cond, $nbrunit_typecond)
{
    $pdo = getConnexion();

    if (!empty($_POST['codetype_cond']) && !empty($_POST['nbrunit_typecond']) && !empty($_POST['idcond'])) {


        if (is_numeric($nbrunit_typecond)) {

            // Creation de la requete
            $req = "INSERT INTO  type_conditionnement (idtype_cond, idcond, codetype_cond, nbrunit_typecond) value(NULL, :idcond, :codetype_cond, :nbrunit_typecond)";
            // Attribution de la valeur post
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':codetype_cond', $codetype_cond);
            $stmt->bindParam(':idcond', $idcond);
            $stmt->bindParam(':nbrunit_typecond', $nbrunit_typecond);

            // Execution de la requete
            $stmt->execute();

            if ($stmt) {
                $tab_retour["statut"] = true;
                $tab_retour["message"] = "Enregistrement effectue avec succes";
            } else {
                // Tous les Champs sont vides
                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Echec lors de la creation essayez de nouveau";
            }
        } else {

            // Le prix mal renseigne
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Verifiez la valeur du nombre d'unite";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE TYPE CONDITIONNEMENT
 * 
 */

/**
 * DELETE TYPE CONDITIONNEMENT
 *
 */
function deleteTypeCondi($idtype_cond)
{
    $pdo = getConnexion();

    if (!empty($idtype_cond)) {


        // Creation de la requete
        $req = "DELETE FROM type_conditionnement WHERE idtype_cond = :idtype_cond";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idtype_cond', $idtype_cond);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cette entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}
/**
 * 
 * END DELETE TYPE CONDITIONNEMENT
 * 
 */

/**
 * UPDATE TYPE CONDITIONNEMENT
 *
 */
function updateTypeCondi($idtype_cond)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    // Recuperation des variables
    $codetype_cond = $donnees->codetype_cond;
    $idcond = $donnees->idcond;
    $nbrunit_typecond = $donnees->nbrunit_typecond;
    $dateupdate = date('Y-m-d H:i:s');

    if (!empty($nbrunit_typecond) && !empty($codetype_cond)) {

        if (is_numeric($nbrunit_typecond)) {

            // Creation de la requete
            $req = "UPDATE type_conditionnement SET idcond = :idcond, codetype_cond = :codetype_cond, nbrunit_typecond = :nbrunit_typecond, dateupdate = :dateupdate WHERE idtype_cond = :idtype_cond";
            // Attribution de la valeur post
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':idtype_cond', $idtype_cond);
            $stmt->bindParam(':idcond', $idcond);
            $stmt->bindParam(':codetype_cond', $codetype_cond);
            $stmt->bindParam(':nbrunit_typecond', $nbrunit_typecond);
            $stmt->bindParam(':dateupdate', $dateupdate);
            // Execution de la requete
            $stmt->execute();

            if ($stmt) {
                $tab_retour["statut"] = true;
                $tab_retour["message"] = "Enregistrement mis a jour avec succes";
            } else {
                // Tous les Champs sont vides
                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
            }
        } else {

            // Le prix mal renseigne
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Verifiez la valeur du nombre d'unite";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }

    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE TYPE CONDITIONNEMENT
 * 
 */

/************************************************************************************
 * 
 * CREATE CONDITIONNEMENT : champs  idcond, idtype_cond, codecond, desigcond, datecreate, dateupdate, 
 *
 *************************************************************************************/
function createConditionnement($codecond, $desigcond, $unitcond)
{
    $pdo = getConnexion();

    if (!empty($_POST['codecond']) && !empty($_POST['desigcond']) && !empty($_POST['unitcond'])) {

        // Creation de la requete
        $req = "INSERT INTO  conditionnement (idcond, codecond, desigcond, unitcond) value(NULL, :codecond, :desigcond,:unitcond)";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':codecond', $codecond);
        $stmt->bindParam(':desigcond', $desigcond);
        $stmt->bindParam(':unitcond', $unitcond);

        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement effectue avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec lors de la creation essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE CONDITIONNEMENT
 * 
 */

/**
 * DELETE CONDITIONNEMENT
 *
 */
function deleteConditionnement($idcond)
{
    $pdo = getConnexion();

    if (!empty($idcond)) {


        // Creation de la requete
        $req = "DELETE FROM conditionnement WHERE idcond = :idcond";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idcond', $idcond);
        // Execution de la requete
        $stmt->execute();

        if ($stmt > 0) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cette entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}
/**
 * 
 * END DELETE CONDITIONNEMENT
 * 
 */

/**
 * UPDATE CONDITIONNEMENT  
 *
 */
function updateConditionnement($idcond)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    // Recuperation des variables
    $codecond = $donnees->codecond;
    $desigcond = $donnees->desigcond;
    $unitcond = $donnees->unitcond;
    $dateupdate = date('Y-m-d H:i:s');

    if (!empty($codecond) && !empty($desigcond) && !empty($unitcond)) {


        // Creation de la requete
        $req = "UPDATE conditionnement SET codecond = :codecond,  unitcond = :unitcond, desigcond = :desigcond, dateupdate = :dateupdate WHERE idcond = :idcond";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idcond', $idcond);
        $stmt->bindParam(':codecond', $codecond);
        $stmt->bindParam(':desigcond', $desigcond);
        $stmt->bindParam(':unitcond', $unitcond);
        $stmt->bindParam(':dateupdate', $dateupdate);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement mis a jour avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }

    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE CONDITIONNEMENT
 * 
 */


/************************************************************************************
 * 
 * CREATE FOURNISSEUR : 
 * champs: idfour,idcond,codefour,desigfour,telfour,villefour,paysfour,bpfour,adrfour,datecreate,dateupdate  
 *
 *************************************************************************************/
function createFournisseur($codefour, $desigfour, $fourtype, $telfour, $villefour, $paysfour, $bpfour, $adrfour)
{
    $pdo = getConnexion();

    if (!empty($_POST['codefour']) && !empty($_POST['desigfour']) && !empty($_POST['fourtype']) && !empty($_POST['telfour']) && !empty($_POST['villefour']) && !empty($_POST['paysfour'])) {



        // Creation de la requete
        $req = "INSERT INTO  fournisseur (idfour, codefour, desigfour, fourtype, telfour, villefour, paysfour, bpfour, adrfour) value(NULL, :codefour, :desigfour,  :fourtype, :telfour, :villefour, :paysfour, :bpfour, :adrfour)";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':codefour', $codefour);
        $stmt->bindParam(':desigfour', $desigfour);
        $stmt->bindParam(':fourtype', $fourtype);
        $stmt->bindParam(':telfour', $telfour);
        $stmt->bindParam(':villefour', $villefour);
        $stmt->bindParam(':paysfour', $paysfour);
        $stmt->bindParam(':bpfour', $bpfour);
        $stmt->bindParam(':adrfour', $adrfour);

        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement effectue avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec lors de la creation essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE FOURNISSEUR
 * 
 */

/**
 * DELETE FOURNISSEUR
 *
 */
function deleteFournisseur($idfour)
{
    $pdo = getConnexion();

    if (!empty($idfour)) {


        // Creation de la requete
        $req = "DELETE FROM fournisseur WHERE idfour = :idfour";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idfour', $idfour);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cette entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}
/**
 * 
 * END DELETE FOURNISSEUR
 * 
 */

/**
 * UPDATE FOURNISSEUR 
 *
 */
function updateFournisseur($idfour)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    // Recuperation des variables
    $codefour = $donnees->codefour;
    $desigfour = $donnees->desigfour;
    $fourtype = $donnees->fourtype;
    $telfour = $donnees->telfour;
    $villefour = $donnees->villefour;
    $paysfour = $donnees->paysfour;
    $bpfour = $donnees->bpfour;
    $adrfour = $donnees->adrfour;
    //echo $idfour; exit;
    $dateupdate = date('Y-m-d H:i:s');
    // idfour,codefour,desigfour,fourtype,telfour,villefour,paysfour,bpfour,adrfour
    if (!empty($codefour) && !empty($idfour)  && !empty($desigfour) && !empty($fourtype) && !empty($telfour) && !empty($villefour) && !empty($paysfour) && !empty($bpfour) && !empty($adrfour)) {

        // Creation de la requete
        $req = "UPDATE fournisseur SET codefour = :codefour, desigfour = :desigfour, fourtype = :fourtype, telfour = :telfour,  villefour = :villefour,  paysfour = :paysfour,  bpfour = :bpfour, adrfour = :adrfour, dateupdate = :dateupdate WHERE idfour = :idfour";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idfour', $idfour);
        $stmt->bindParam(':codefour', $codefour);
        $stmt->bindParam(':desigfour', $desigfour);
        $stmt->bindParam(':fourtype', $fourtype);
        $stmt->bindParam(':telfour', $telfour);
        $stmt->bindParam(':villefour', $villefour);
        $stmt->bindParam(':paysfour', $paysfour);
        $stmt->bindParam(':bpfour', $bpfour);
        $stmt->bindParam(':adrfour', $adrfour);
        $stmt->bindParam(':dateupdate', $dateupdate);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement mis a jour avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }

    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE FOURNISSEUR
 * 
 */



/*************************************************************************************
 * 
 * CREATE REFERENCE FOURNISSEUR : 
 * champs: idref_four,idfour,idref_art,coderef_four,prix,datecreate,dateupdate   
 *
 *************************************************************************************/
function createRefFournisseur($idfour, $idref_art, $coderef_four, $prix)
{
    $pdo = getConnexion();

    if (!empty($idref_art) && !empty($idfour) && !empty($coderef_four) && !empty($prix)) {


        if (is_numeric($prix)) {

            // Creation de la requete
            $req = "INSERT INTO  ref_fournisseur (idref_four, idfour, idref_art, coderef_four, prix) value(NULL, :idfour, :idref_art, :coderef_four, :prix)";
            // Attribution de la valeur post
            $stmt = $pdo->prepare($req);

            $stmt->bindParam(':idfour', $idfour);
            $stmt->bindParam(':idref_art', $idref_art);
            $stmt->bindParam(':coderef_four', $coderef_four);
            $stmt->bindParam(':prix', $prix);

            // Execution de la requete
            $stmt->execute();

            if ($stmt) {
                $tab_retour["statut"] = true;
                $tab_retour["message"] = "Enregistrement effectue avec succes";
            } else {
                // Tous les Champs sont vides
                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Echec lors de la creation essayez de nouveau";
            }
        } else {

            // Le prix mal renseigne
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Verifiez la valeur du prix indique";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE REF FOURNISSEUR
 * 
 */

/**
 * DELETE REF FOURNISSEUR
 *
 */
function deleteRefFournisseur($idref_four)
{
    $pdo = getConnexion();

    if (!empty($idref_four)) {


        // Creation de la requete
        $req = "DELETE FROM ref_fournisseur WHERE idref_four = :idref_four";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idref_four', $idref_four);
        // Execution de la requete
        $stmt->execute();
        // Retourne le nombre de ligne
        $nbre = $stmt->rowCount();

        if ($stmt) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cette entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}
/**
 * 
 * END DELETE REF FOURNISSEUR
 * 
 */

/**
 * UPDATE REF FOURNISSEUR 
 *
 */
function updateRefFournisseur($idref_four)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    // Recuperation des variables
    $idfour = $donnees->idfour;
    $idref_art = $donnees->idref_art;
    $coderef_four = $donnees->coderef_four;
    $prix = $donnees->prix;
    $dateupdate = date('Y-m-d H:i:s');

    if (!empty($idfour) && !empty($idref_art) && !empty($coderef_four) && !empty($prix)) {


        if (is_numeric($prix)) {

            // Creation de la requete
            $req = "UPDATE ref_fournisseur SET idfour = :idfour, idref_art = :idref_art,  coderef_four = :coderef_four,  prix = :prix, dateupdate = :dateupdate WHERE idref_four = :idref_four";
            // Attribution de la valeur post
            $stmt = $pdo->prepare($req);
            $stmt->bindParam(':idref_four', $idref_four);
            $stmt->bindParam(':idfour', $idfour);
            $stmt->bindParam(':idref_art', $idref_art);
            $stmt->bindParam(':coderef_four', $coderef_four);
            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':dateupdate', $dateupdate);
            // Execution de la requete
            $stmt->execute();

            if ($stmt) {
                $tab_retour["statut"] = true;
                $tab_retour["message"] = "Enregistrement mis a jour avec succes";
            } else {
                // Tous les Champs sont vides
                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
            }
        } else {

            // Le prix mal renseigne
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Verifiez la valeur du prix indique";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE REF FOURNISSEUR
 * 
 */

/*************************************************************************************
 * 
 * CREATE CLIENT ETAT : 
 * champs: idclt_etat,idclt,codeclt_etat,desigclt_etat,validclt_etat,dateclt_emis,
 * dateclt_exp,img,datecreate,dateupdate   
 *
 ************************************************************************************/
function createClientEtat($idclt, $codeclt_etat, $desigclt_etat, $validclt_etat, $dateclt_emis, $dateclt_exp, $img)
{
    $pdo = getConnexion();

    if (!empty($idclt) && !empty($codeclt_etat) && !empty($desigclt_etat) && !empty($validclt_etat) && !empty($dateclt_emis) && !empty($dateclt_exp) && !empty($img)) {

        //echo $img; exit;

        if (!empty($img)) {

            $file_img = ged_uploadFile(1);
            $img = $file_img[0];

            if ($img == 1) {

                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Respectez les extension de fichier";
            } elseif ($img == 2) {

                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Fichier trop lourd";
            } else {

                // Creation de la requete
                $req = "INSERT INTO client_etat (idclt_etat, idclt, codeclt_etat, desigclt_etat, validclt_etat, dateclt_emis, dateclt_exp, img) value(NULL, :idclt, :codeclt_etat, :desigclt_etat, :validclt_etat, :dateclt_emis, :dateclt_exp, :img)";
                // Attribution de la valeur post
                $stmt = $pdo->prepare($req);

                $stmt->bindParam(':idclt', $idclt);
                $stmt->bindParam(':codeclt_etat', $codeclt_etat);
                $stmt->bindParam(':desigclt_etat', $desigclt_etat);
                $stmt->bindParam(':validclt_etat', $validclt_etat);
                $stmt->bindParam(':dateclt_emis', $dateclt_emis);
                $stmt->bindParam(':dateclt_exp', $dateclt_exp);
                $stmt->bindParam(':img', $img);

                // Execution de la requete
                $stmt->execute();
                if ($stmt) {
                    $tab_retour["statut"] = true;
                    $tab_retour["message"] = "Enregistrement effectue avec succes";
                } else {
                    // Tous les Champs sont vides
                    $tab_retour["statut"] = False;
                    $tab_retour["message"] = "Echec lors de la creation essayez de nouveau";
                }
            }
        } else {
            $img = "";
            // Creation de la requete
            $req = "INSERT INTO client_etat (idclt_etat, idclt, codeclt_etat, desigclt_etat, validclt_etat, dateclt_emis, dateclt_exp, img) value(NULL, :idclt, :codeclt_etat, :desigclt_etat, :validclt_etat, :dateclt_emis, :dateclt_exp, :img)";
            // Attribution de la valeur post
            $stmt = $pdo->prepare($req);

            $stmt->bindParam(':idclt', $idclt);
            $stmt->bindParam(':codeclt_etat', $codeclt_etat);
            $stmt->bindParam(':desigclt_etat', $desigclt_etat);
            $stmt->bindParam(':validclt_etat', $validclt_etat);
            $stmt->bindParam(':dateclt_emis', $dateclt_emis);
            $stmt->bindParam(':dateclt_exp', $dateclt_exp);
            $stmt->bindParam(':img', $img);

            // Execution de la requete
            $stmt->execute();

            if ($stmt) {
                $tab_retour["statut"] = true;
                $tab_retour["message"] = "Enregistrement effectue avec succes";
            } else {

                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Echec lors de la creation essayez de nouveau";
            }
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE CLIENT ETAT
 * 
 */

/**
 * DELETE CLIENT ETAT
 *
 */
function deleteClientEtat($idclt_etat)
{
    $pdo = getConnexion();

    if (!empty($idclt_etat)) {


        // recuperation de l'image associee au client qu'il faudra supprimer
        $req_img = "SELECT * FROM client_etat WHERE idclt_etat = :idclt_etat";
        // Attribution de la valeur post
        $stmt_imgclt = $pdo->prepare($req_img);
        $stmt_imgclt->bindParam(':idclt_etat', $idclt_etat);
        // Execution de la requete
        $stmt_imgclt->execute();

        $tab_img = $stmt_imgclt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tab_img as $key => $value) {
            $img_clt = $value['img'];
            unlink('uploads/' . $img_clt);
            // print_r('uploads/'. $img_clt); exit;
        }

        // Creation de la requete
        $req = "DELETE FROM client_etat WHERE idclt_etat = :idclt_etat";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idclt_etat', $idclt_etat);
        // Execution de la requete
        $stmt->execute();


        if ($stmt) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cette entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}
/**
 * 
 * END DELETE CLIENT ETAT
 * 
 */

/**
 * UPDATE CLIENT ETAT
 *
 */
function updateClientEtat($idclt_etat)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    // Recuperation des variables
    $idclt = $donnees->idclt;
    $codeclt_etat = $donnees->codeclt_etat;
    $desigclt_etat = $donnees->desigclt_etat;
    $validclt_etat = $donnees->validclt_etat;
    $dateclt_emis = $donnees->dateclt_emis;
    $dateclt_exp = $donnees->dateclt_exp;
    $img = $donnees->img;
    $dateupdate = date('Y-m-d H:i:s');

    if (!empty($idclt) && !empty($codeclt_etat) && !empty($desigclt_etat) && !empty($validclt_etat) && !empty($dateclt_emis) && !empty($dateclt_exp) && !empty($img)) {


        // Creation de la requete
        $req = "UPDATE client_etat SET idclt = :idclt, codeclt_etat = :codeclt_etat,  desigclt_etat = :desigclt_etat,  validclt_etat = :validclt_etat,  dateclt_emis = :dateclt_emis,  dateclt_exp = :dateclt_exp, img = :img,  dateupdate = :dateupdate WHERE idclt_etat = :idclt_etat";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idclt_etat', $idclt_etat);
        $stmt->bindParam(':idclt', $idclt);
        $stmt->bindParam(':codeclt_etat', $codeclt_etat);
        $stmt->bindParam(':desigclt_etat', $desigclt_etat);
        $stmt->bindParam(':validclt_etat', $validclt_etat);
        $stmt->bindParam(':dateclt_emis', $dateclt_emis);
        $stmt->bindParam(':dateclt_exp', $dateclt_exp);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':dateupdate', $dateupdate);
        // Execution de la requete
        $stmt->execute();
        // Retourne le nombre de ligne
        $nbre = $stmt->rowCount();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement mis a jour avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }

    sendJSON($tab_retour);
}
/**
 * 
 * END UPDATE CLIENT ETAT
 * 
 */

/*************************************************************************************
 * 
 * CREATE FOURNISSUER ETAT : 
 * champs: idfour_etat, idfour, codefour_etat, desigfour_etat, validfour_etat, date_emis, 
 * date_exp, 	
 *img
 ************************************************************************************/
function createFourEtat($idfour, $codefour_etat, $desigfour_etat, $validfour_etat, $date_emis, $date_exp, $img)
{
    $pdo = getConnexion();

    if (!empty($idfour) && !empty($codefour_etat) && !empty($desigfour_etat) && !empty($validfour_etat) && !empty($date_emis) && !empty($date_exp) && !empty($img)) {

        if (!empty($img)) {

            $file_img = ged_uploadFile(1);
            $img = $file_img[0];

            if ($img == 1) {

                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Respectez les extension de fichier";
            } elseif ($img == 2) {

                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Fichier trop lourd";
            } else {

                // Creation de la requete
                $req = "INSERT INTO fournisseur_etat (idfour_etat, idfour, codefour_etat, desigfour_etat, validfour_etat, date_emis, date_exp, img) value(NULL, :idfour, :codefour_etat, :desigfour_etat, :validfour_etat, :date_emis, :date_exp, :img)";
                // Attribution de la valeur post
                $stmt = $pdo->prepare($req);

                $stmt->bindParam(':idfour', $idfour);
                $stmt->bindParam(':codefour_etat', $codefour_etat);
                $stmt->bindParam(':desigfour_etat', $desigfour_etat);
                $stmt->bindParam(':validfour_etat', $validfour_etat);
                $stmt->bindParam(':date_emis', $date_emis);
                $stmt->bindParam(':date_exp', $date_exp);
                $stmt->bindParam(':img', $img);

                // Execution de la requete
                $stmt->execute();
                if ($stmt) {
                    $tab_retour["statut"] = true;
                    $tab_retour["message"] = "Enregistrement effectue avec succes";
                } else {
                    // Tous les Champs sont vides
                    $tab_retour["statut"] = False;
                    $tab_retour["message"] = "Echec lors de la creation essayez de nouveau";
                }
            }
        } else {
            $img = "";
            // Creation de la requete
            $req = "INSERT INTO fournisseur_etat (idfour_etat, idfour, codefour_etat, desigfour_etat, validfour_etat, datefour_emis, datefour_exp, img) value(NULL, :idfour, :codefour_etat, :desigfour_etat, :validfour_etat, :date_emis, :date_exp, :img)";
            // Attribution de la valeur post
            $stmt = $pdo->prepare($req);

            $stmt->bindParam(':idfour', $idfour);
            $stmt->bindParam(':codefour_etat', $codefour_etat);
            $stmt->bindParam(':desigfour_etat', $desigfour_etat);
            $stmt->bindParam(':validfour_etat', $validfour_etat);
            $stmt->bindParam(':date_emis', $date_emis);
            $stmt->bindParam(':date_exp', $date_exp);
            $stmt->bindParam(':img', $img);

            // Execution de la requete
            $stmt->execute();

            if ($stmt) {
                $tab_retour["statut"] = true;
                $tab_retour["message"] = "Enregistrement effectue avec succes";
            } else {

                $tab_retour["statut"] = False;
                $tab_retour["message"] = "Echec lors de la creation essayez de nouveau";
            }
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }
    sendJSON($tab_retour);
}

/**
 * 
 * END CREATE FOURNISSEUR ETAT
 * 
 */

/**
 * DELETE FOURNISSEUR ETAT
 *
 */
function deleteFourEtat($idfour_etat)
{
    $pdo = getConnexion();

    if (!empty($idfour_etat)) {


        // recuperation de l'image associee au client qu'il faudra supprimer
        $req_img = "SELECT * FROM  fournisseur_etat WHERE idfour_etat = :idfour_etat";
        // Attribution de la valeur post
        $stmt_imgclt = $pdo->prepare($req_img);
        $stmt_imgclt->bindParam(':idfour_etat', $idfour_etat);
        // Execution de la requete
        $stmt_imgclt->execute();

        $tab_img = $stmt_imgclt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tab_img as $key => $value) {
            $img_clt = $value['img'];
            unlink('uploads/' . $img_clt);
        }

        // Creation de la requete
        $req = "DELETE FROM fournisseur_etat WHERE idfour_etat = :idfour_etat";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idfour_etat', $idfour_etat);
        // Execution de la requete
        $stmt->execute();


        if ($stmt) {

            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement supprime avec succes";
        } else {

            $tab_retour["statut"] = false;
            $tab_retour["message"] = "Echec de l'operation, verifiez que cette entite existe ou reessayez a nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Cette information n'existe pas ou a ete supprimee";
    }
    sendJSON($tab_retour);
}
/**
 * 
 * END DELETE FOURNISSEUR ETAT
 * 
 */
/**
 * UPDATE FOURNISSEUR ETAT
 *
 */
function updateFourEtat($idfour_etat)
{
    $pdo = getConnexion();

    $donnees = json_decode(file_get_contents("php://input"));
    // Recuperation des variables
    $idfour = $donnees->idfour;
    $codefour_etat = $donnees->codefour_etat;
    $desigfour_etat = $donnees->desigfour_etat;
    $validfour_etat = $donnees->validfour_etat;
    $date_emis = $donnees->date_emis;
    $date_exp = $donnees->date_exp;
    $img = $donnees->img;
    $dateupdate = date('Y-m-d H:i:s');

    if (!empty($idfour) && !empty($codefour_etat) && !empty($desigfour_etat) && !empty($validfour_etat) && !empty($date_emis) && !empty($date_exp) && !empty($img)) {

        // Creation de la requete
        $req = "UPDATE fournisseur_etat SET idfour = :idfour, codefour_etat = :codefour_etat,  desigfour_etat = :desigfour_etat,  validfour_etat = :validfour_etat,  date_emis = :date_emis,  date_exp = :date_exp, img = :img,  dateupdate = :dateupdate WHERE idfour_etat = :idfour_etat";
        // Attribution de la valeur post
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':idfour_etat', $idfour_etat);
        $stmt->bindParam(':idfour', $idfour);
        $stmt->bindParam(':codefour_etat', $codefour_etat);
        $stmt->bindParam(':desigfour_etat', $desigfour_etat);
        $stmt->bindParam(':validfour_etat', $validfour_etat);
        $stmt->bindParam(':date_emis', $date_emis);
        $stmt->bindParam(':date_exp', $date_exp);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':dateupdate', $dateupdate);
        // Execution de la requete
        $stmt->execute();

        if ($stmt) {
            $tab_retour["statut"] = true;
            $tab_retour["message"] = "Enregistrement mis a jour avec succes";
        } else {
            // Tous les Champs sont vides
            $tab_retour["statut"] = False;
            $tab_retour["message"] = "Echec de mise a jour essayez de nouveau";
        }
    } else {

        // Tous les Champs sont vides
        $tab_retour["statut"] = False;
        $tab_retour["message"] = "Il manque des infos, ces champs sont obligatoires";
    }

    sendJSON($tab_retour);
}
/**
 * END UPDATE FOURNISSEUR ETAT
 *
 */
