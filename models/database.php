<?php 

/**
 * Connexion PDO to DBB
 * 
 * @return PDO
 */
function pdo() {
// 1- création des variables de connections
$serveur = "localhost";
$dbname = "app_student";
$login = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$serveur; dbname=$dbname", $login, $password, array(
        PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8",
        // récupérer datas sous forme de tableau associatif
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // voir les erreur
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));

    return $pdo;
    // echo"Connexion réussie";
} catch (PDOException $e) {
    echo "Erreur de connexion : ". $e -> getMessage();
}
}