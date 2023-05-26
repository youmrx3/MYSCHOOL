<?php


$subs = $controller->loadUserFormations($user->id);

    foreach ($subs as $school) {
        include_once 'features/school/school_card.php';
    }


?>