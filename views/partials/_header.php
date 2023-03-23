<?php
// démarage de la session
session_start();
// require_once('helpers/pdo.php');
include('helpers/data.php');
include('helpers/functions.php');
require_once('models/model.php');


// debug_array($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- tailwind -->
      <script src="https://cdn.tailwindcss.com"></script>
      <!-- daisy UI -->
      <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.4/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Happy School <?php $title ?></title>
</head>
<body class= >
    
<header class="flex justify-between text-xl bg-indigo-600 text-[20px] text-white p-[3rem] ">
    <a href="index.php" class="text-4xl font-bold">Happy School</a>



<?php
include('views/partials/_nav.php')
?>

</header>
<main class="px-24 py-20 flex flex-col min-h-screen">