<?php
$title ="Ajouter un étudiant";

// capture du html
ob_start();
include('views/studentPage/addStudent.php');

// capture et stock dans le $content
$content = ob_get_clean();
require('views/layout.php');