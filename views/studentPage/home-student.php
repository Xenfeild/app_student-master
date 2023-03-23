<div class="">

    <h2 class="text-center text-4xl font-bold pb-10"><?= $title ?></h2>
        <a href="add-student.php" class="btn btn-primary">ajouter un étudiant</a>
   <?php
      include('views/partials/_alert.php');
      include('views/partials/_table-student.php');
    ?>
</div>