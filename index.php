<?php
session_start();
// titre de la page
$title = "Nos étudiants";
// demande model de lui donner tous les étudiants
require_once('models/model.php');
// query for get all students
$students = getALL('students', 'fName');
// je fais une capture de tous le html
ob_start();
include('views/studentPage/home-student.php');
//stop la capture et stock tous ce que j'ai capturer dans $content
$content = ob_get_clean();
require('views/layout.php');

debug_array($students);



