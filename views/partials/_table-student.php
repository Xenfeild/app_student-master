<div class="overflow-x-auto">
  <table class="table table-zebra w-full">
    <!-- head -->
    <thead>
      <tr>
        <th>Id</th>
        <th>prénom</th>
        <th>Nom</th>
        <th>formaton</th>
        <th>Status</th>
        <th>Voir</th>
        <th>Modifier</th>
      </tr>
    </thead>
    <tbody>
<?php 
  foreach ($students as $student) {?>
      <tr>
        <th><?= $student['id']?></th>
        <td><?= $student['fName']?></td>
        <td><?= $student['lName']?></td>
        <td><?= $student['formation'] ?></td>
        <td><?= $student['status'] == 0 ? "liste d'attente": "Inscrit" ?></td>
        <td>
          <a href="show-student.php?id=<?=$student['id']?>&first_name=<?=$student['fName']?>&last_name=<?= $student['lName']?>">
              <i class="fa-solid fa-eye"></i>
          </a>
      </td>
        <td><i class="fa-solid fa-pencil"></i></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
  
