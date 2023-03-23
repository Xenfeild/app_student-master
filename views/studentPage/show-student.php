
    <h2 class="text-center text-4xl font-bold pb-20" >Information de l'étudiant: <?= $student['fName'] ?> <?=$student['lName']?></h2>
<div class="flex justify-around">
    <img class=" h-[400px]  flex rounded-full" src="<?= $student['url_img']?>" alt="">
    <div class="pt-[8rem]">
        <P class="text-2xl"><span class="font-bold">Prenom</span> : <?= $student['fName'] ?></P>
        <P class="text-2xl"><span class="font-bold">Nom</span> : <?= $student['lName'] ?></P>
        <P class="text-2xl"><span class="font-bold">Age</span> : <?= $student['age'] ?></P>
        <P class="text-2xl"><span class="font-bold">date de naissance</span> : <?= 
        $date = date("d/m/y", strtotime($student['date_of_birth']))?></P>
        <P class="text-2xl"><span class="font-bold">E-mail</span> : <?= $student['email'] ?></P>
        <P class="text-2xl"><span class="font-bold">Formation</span> : <?= $student['formation'] ?></P>
    </div>
<div class="text-[20px]">
<button><a href="update.php?id=<?=$student['id']?>"><i class="fa-solid fa-pencil"></a></i></button>
<button><a href="delete.php?id=<?=$student['id']?>"><i class="fa-solid fa-trash"></i></a></button>
</div>
</div>