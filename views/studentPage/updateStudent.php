<?php
// validation formulaire
// étape 1 création de mes variables
include_once ('helpers/functions.php');
$error = [];
$errMsgRequire = "<span class='text-red-500'>Ce champ est obligatoire</span>";
$success = false;
require_once('models/model.php');

//récupérer le student avec le bon ID
$student = get("students");
debug_array ($student);

// 2-Verification si le formulaire est soumis
if(!empty($_POST['submitted'])){
    require_once('helpers/validate-input/validateInput.php');
    create($fName, $lName,$email, $age, $formation, $date_of_birth, $status);
}

?>

<h2 class="text-center text-4xl font-bold pb-10"><?= $title ?></h2>
<div class="flex flex-col">
    <p><?= $success ?></p>
    <form method="POST" class="flex flex-col items-center" >
        <!-- first name -->
        <label class="font-bold mt-[20px]" for="fName">Prénom</label>
        <input type="text" placeholder="John" class="input input-bordered w-full max-w-xs" name="fName" value="<?php $student['fName']?>"/>
        <p><?php errorMsg('fName') ?></p>
        <!-- last name -->
        <label class="font-bold mt-[20px]" for="lName">Nom</label>
        <input type="text" placeholder="Doe" class="input input-bordered w-full max-w-xs" name="lName" value="<?php $student['lName']?>"/>
        <p><?php errorMsg('lName') ?></p>
        <!-- e-mail -->
        <label for="email" class="font-bold mt-[20px]" >E-mail</label>
        <input type="email" placeholder="johnDoe@gmail.com" class="input input-bordered w-full max-w-xs" name="email" value="<?php $student['email']?>"/>
        <p><?php errorMsg('email') ?></p>
        <!-- age -->
        <label class="font-bold mt-[20px]" for="age">Age</label>
        <input type="number" placeholder="99" class="input input-bordered w-full max-w-xs" name="age" value="<?php $student['age']?>"/>
        <p><?php errorMsg('age') ?></p>
        <!-- date de naissance -->
        <label class="font-bold mt-[20px]" for="date_of_birth">Date de naissance</label>
        <input type="date"  class="input input-bordered w-full max-w-xs" name="date_of_birth" value="<?php showInputValue ($name)?>"/>
        <p><?php errorMsg('daye_of_birth') ?></p>
        <!-- status -->
        <div class="form-control flex">
            <label class="label cursor-pointer" for="status">
                <span class="label-text">Inscrit</span> 
                </label>
                <input type="radio" value='1' name="status" class="radio checked:bg-red-500 <?php showUpdateRadioValue($student ["status"]) ?>" />
        </div>
        <div class="form-control flex">
            <label class="label cursor-pointer" for="status">
                <span class="label-text">Liste d'attente</span> 
                </label>
                <input type="radio" value="0" name="status" class="radio checked:bg-red-500 <?php showUpdateRadioValue($student['status']) ?>" />
                <p><?php errorMsg('status') ?></p>
        </div>
        <!-- formation  -->
        <?php
        $formationOption = [
            ["name" => "Dev React"],
            ["name" => "Dev Front"],
            ["name" => "Dev Laravel"], 
            ["name" => "Dev Symphony"], 
            ["name" => "commerce international"],
        ];
        ?>
        <div class="form-control w-full max-w-xs">
        <label class="label" for="formation">
            <span class="font-bold">Nos formations</span>
        </label>
        <select class="select select-bordered" name="formation">
            <option disabled selected>Choisi une formation</option>
            <?php foreach($formationOption as $item) : ?>
                <option value="<?= $student['formation'] ?>"<?php in_array$student['formation']?>>Dev React<?= $item['name']?></option>
            <?php endforeach ?>
        </select>
        <p><?php errorMsg('formation') ?></p>
        <input type="hidden" name="id" value="<?php $student['id'] ?>">
        </div>
        <div class="mt-[20px] "> 
            <input type="submit" class="btn btn-primary btn-active" name="submitted" value="Envoyer">
        </div>
    </form>
</div>