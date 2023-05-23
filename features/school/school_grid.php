<?php 
    include_once 'helpers/database/database_controller.php';

    include_once 'helpers/database/database_creator.php';

    $db = new DatabaseCreator();
    $conn = $db -> connectToDatabase();
    $controller = new DatabaseController($conn);

?>


<section id="Les-écoles-disponibles">
        <h1 class="title">Les écoles disponibles</h1>
        <div class="content">

            <?php 

                $schools = $controller -> getSchools();

                foreach($schools as $school){


                    include 'features/school/school_card.php';

                }

            ?>
        </div>
</section>        