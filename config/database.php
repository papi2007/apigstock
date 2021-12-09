<?php
//LOCALHOST
function getConnexion()
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=progstock;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        throw new PDOException("Echec de connexion: " . $e->getMessage());
    }

}
// ONLINE
/*function getConnexion()
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=gsprosygma;charset=utf8", "gsprosygma", "3LsKhb99@%hP");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        throw new PDOException("Echec de connexion: " . $e->getMessage());
    }

}*/

?>