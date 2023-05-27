<?php

$root = $_SERVER['DOCUMENT_ROOT'];

include_once $root . '/helpers/database/database_creator.php';

include_once $root . '/helpers/database/database_controller.php';


$db = new DatabaseCreator();
$conn = $db->connectToDatabase();
$controller = new DatabaseController($conn);



?>




<div class="admin-applications-listview">

    <h1 class="title">Demandes en attente</h1>


    <div class="listview-content">
        <?php

        $applications = $controller->getPendingApplications();

        if(
            count ($applications) == 0
        ){
            echo '<h1 class="title">Aucune demande en attente</h1>';
            return;
        }

        foreach ($applications as $application) {
            include $adminRoot . '/components/application_item.php';
        }
        ?>
    </div>

</div>