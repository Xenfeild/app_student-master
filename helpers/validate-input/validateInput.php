<?php
       // 2- faille xss
$id = trim(htmlspecialchars($_POST['id']));
$fName = trim(htmlspecialchars($_POST['fName']));
    $lName = trim(htmlspecialchars($_POST['lName']));
    $email = trim(htmlspecialchars($_POST['email']));
    $age = trim(htmlspecialchars($_POST['age']));
    $date_of_birth = trim(htmlspecialchars($_POST['date_of_birth']));
    $status = isset($_POST['status'])?trim(htmlspecialchars($_POST['status'])): ""; //vérifie qu'il a été checked
    $formation = isset($_POST['formation'])?trim(htmlspecialchars($_POST['formation'])): "";

    // validation des champs
    // first Name
    if(empty($fName)){
        $error['fName'] = $errMsgRequire;
    } elseif(strlen($fName) < 4 || strlen($fName) > 40) {
        $error['fName'] = "<span class='text-red-500'>Le prénom doit contenir 4 à 40 caractères! /span>";
    } else {
        // $error['fName'] = $errorMsgRequire;
    }
    // last name
    if(empty($lName)){
        $error['lName'] = $errMsgRequire;
    } elseif(strlen($lName) < 4 || strlen($lName) > 40) {
        $error['lName'] = "<span class='text-red-500'>Le prénom doit contenir 4 à 40 caractères! /span>";
    } else {
        // $error['lName'] = $errorMsgRequire;
    }
    // email
    if(empty($email)){
        $error['email'] = $errMsgRequire;
    } elseif(strlen($email) < 4 || strlen($email) > 40) {
        $error['email'] = "<span class='text-red-500'>Le prénom doit contenir 4 à 40 caractères! /span>";
    } else {
        // $error['email'] = $errorMsgRequire;
    }
    // age
    if (!empty($age)){
        // vérifie que l'age est un nombre entier
        if(!is_numeric($age)){
            $error['age'] = "<span class='text-red-500'>Merci de mettre un age correct</span>";
            // vérifie qu'il est bien majeur
        }
         elseif($age < 0) {
         $error['age'] = "<span class='text-red-500'>Pas d'age négatif!</span>";
        }
         elseif ($age < 18) {
         $error['age'] = "<span class='text-red-500'>C'est pas pour les minots</span>";

        }   

    } else {
        $error['age'] = $errMsgRequire;
    }   
    // date de naissance
    if (!empty($age)){
        // vérifie que l'age est un nombre entier
        if(!is_numeric($age)){
            $error['age'] = "<span class='text-red-500'>Merci de mettre un age correct</span>";
            // vérifie qu'il est bien majeur
        }
         elseif($age < 0) {
         $error['age'] = "<span class='text-red-500'>Pas d'age négatif!</span>";
        }
         elseif ($age < 18) {
         $error['age'] = "<span class='text-red-500'>C'est pas pour les minots</span>";

        }   

    } else {
        $error['age'] = $errMsgRequire;
    }   
    // formation

    if(empty($formation)){
        $error['formation'] = $errMsgRequire;
    } elseif(strlen($formation) < 4 || strlen($formation) > 40) {
        $error['formation'] = "<span class='text-red-500'>Choissisez une formation' /span>";
    } else {
        // $error['formation'] = $errorMsgRequire;
    }
// status
if (!empty($status)){
    // vérifie que l'status est un nombre entier
    if(!is_numeric($status) || $status < 0 || $status > 1){
        $error['status'] = "<span class='text-red-500'>Stauts invalide</span>";
        // vérifie qu'il est bien majeur
    }

} else {
    $error['status'] = $errMsgRequire;
}   