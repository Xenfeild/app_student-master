<?php
// récupère la connexion à la BDD
require_once('models/database.php');
include_once('helpers/functions.php');
// je stocks la connexion dans $pdo
$pdo = pdo();

// escci_app_student
/**
 * Get return items in DB
 * 
 */
function getALL($table, $order='')
{
    global $pdo;
// 1- je stock ma requette dans une variable
    $sql = "SELECT * FROM $table";
    if($order){
        $sql .= " ORDER BY ". $order;
    }
// 2- Prépare ma requette
    $query = $pdo->prepare($sql);
// 3- execute la requette
    $query->execute();
// 4- Je stock tous le resultat dans une variable
    $items = $query->fetchAll();
// 4- Je retourne le resultat de la query
    return $items;
}


/**
 * Get the id for item
 * 
 * @return int
 */
function getId() {
        // 1 on récupére le bon id
if(!empty($_GET['id']) && isset($_GET['id']) && is_numeric($_GET['id'])){
    // on néttoie l'id
    $id = cleanInput($_GET['id']);
    
} else {
    $_SESSION['error'] = "ID invalide";
    // echo "L'id est invalide!";
    // redirection quand l'id est invalide
    header('Location: index.php');
}
    return $id;

}

/**
 * get a single item
 * 
 * @return array
 */
function get($table)
{
    global $pdo;
    $id =getId();
        // faire la requette
    $sql = "SELECT * FROM $table where id= :id";
    // prépare la requette
    $query = $pdo->prepare($sql);
    // Associe ou lie la valeur à un parametre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // executer la requette
    $query->execute();
    //  on stock l'étudiant dans une variable
    $item = $query->fetch();
    // debug_array($item);
    // pas de item redirect
    if(!$item) {
        $_SESSION["error"] = "Cet étudiant n'existe pas!";
        header('Location: index.php');
    } 
     return $item;
}

/**
 * fonction delete
 * 
 */
function delete() {
    global $pdo;
    global $table;
    $id = getId();
    
  // faire la requette
    $sql = "DELETE FROM $table where id= :id";
    // prépare la requette
    $query = $pdo->prepare($sql);
    // Associe ou lie la valeur à un parametre
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // executer la requette
    $query->execute();
    $_SESSION["succes"] = "L'élement à été supprimé avec succès";
    // redirection
    header(('Location: index.php'));
};

/**
 * insert to database
 * 
 */
function create($fName, $lName,$email, $age, $formation, $date_of_birth, $status) {
    global $error;
    global $pdo;
    global $success;
    if(count($error) == 0) {
        // require_once('helpers/validate-input/validateInput.php');
        $success = true;

        //la requette
        $sql = "INSERT INTO students(fName, lName, email, age, formation, created_at, date_of_birth, status) VALUES(:fName, :lName, :email, :age, :formation, NOW(), :date_of_birth, :status)";
        
        // préparer la requette
        $query = $pdo->prepare($sql); 
        // associer chaque parametre à sa valeur
        $query->bindValue(':fName', $fName, PDO::PARAM_STR);
        $query->bindValue(':lName', $lName, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':age', $age, PDO::PARAM_INT);
        $query->bindValue(':formation', $formation, PDO::PARAM_STR);
        $query->bindValue(':date_of_birth', $date_of_birth, PDO::PARAM_STR);
        $query->bindValue(':status', $status, PDO::PARAM_STR);
        // executer la requette
        $query->execute();

        // redirection
        $_SESSION["success"] = "étudiant ajouté";
        header('location: index.php');
    }
}


// update

function update($fName, $lName,$email, $age, $formation, $date_of_birth, $status, $id) {
    global $error;
    global $pdo;
    global $success;
    if(count($error) == 0) {
        // require_once('helpers/validate-input/validateInput.php');
        $success = true;

        //la requette
        $sql = "UPDATE students SET fName = :fName, lName=:lName, age=:age, formation=:formation, date_of_birth=:date_of_Birth, status=:status, updated_at= NOW() WHERE id=:id";
        // préparer la requette
        $query = $pdo->prepare($sql); 
        // associer chaque parametre à sa valeur
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':fName', $fName, PDO::PARAM_STR);
        $query->bindValue(':lName', $lName, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':age', $age, PDO::PARAM_INT);
        $query->bindValue(':formation', $formation, PDO::PARAM_STR);
        $query->bindValue(':date_of_birth', $date_of_birth, PDO::PARAM_STR);
        $query->bindValue(':status', $status, PDO::PARAM_STR);
        // executer la requette
        $query->execute();

        // // redirection
        // $_SESSION["success"] = "étudiant modifié";
        // header('location: index.php');
    }
}