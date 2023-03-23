<nav class="space-x-10 text-2xl">
<?php
include ('helpers/data.php');
    foreach($navItems as $item) { ?>
    <a href="<?= $item['url']?>" class="hover:text-sky-400"><?= $item['name']?></a>
    <?php } ?>




</nav>