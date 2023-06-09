<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$adminRoot = $root . '/features/admin';

include_once $root . '/helpers/database/database_creator.php';

include_once $root . '/helpers/database/database_controller.php';

$db = new DatabaseCreator();
$conn = $db->connectToDatabase();
$controller = new DatabaseController($conn);






?>




    <div class="admin-ecoles-listview">

        <div class="ecoles-listview-header">
            <h1 class="title">Gestion des Ecoles</h1>

            <button id="add-school-button">Ajouter une Ecole</button>
        </div>

        <div class="listview-content">
            <?php 
            
            $schools = $controller->getSchools();

            if(
                count ($schools) == 0
            ){
                echo '<h1 class="title">Aucune ecole trouver </h1>';
                return;
            }

            foreach($schools as $school){
                    include $adminRoot.'/components/school_item.php';
            }
            ?>
        </div>

    </div>


