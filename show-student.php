<?php 
session_start();
require_once('models/model.php');
    $title = "Information de l'étudiant";
    // debug_array($_GET);
// 1- demande model de me donner un seul étudiant

$student = get('students');

// capture 
ob_start();
include('views/studentPage/show-student.php');
// stop la capture et stock ma capture dans $content
$content = ob_get_clean();
require('views/layout.php');

