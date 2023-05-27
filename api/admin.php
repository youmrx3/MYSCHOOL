<?php

$root = $_SERVER['DOCUMENT_ROOT'];
$adminRoot = $root . '/features/admin';

include_once $root . '/helpers/database/database_creator.php';

include_once $root . '/helpers/database/database_controller.php';
include_once $root . '/components/enable_error_logging.php';

$db = new DatabaseCreator();
$conn = $db->connectToDatabase();
$controller = new DatabaseController($conn);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['panelId'])) {
        $panelId = $_GET['panelId'];


        switch ($panelId) {
            case 0:
                include_once $adminRoot . '/admission_manager.php';
                break;

            case 1:
                include_once $adminRoot . '/school_manager.php';
                break;

            case 2:
                include_once $adminRoot . '/school_editor.php';
                break;
        }
    }

    if (isset($_GET['deleteSchoolId'])) {

        $schoolId = $_GET['deleteSchoolId'];

        $controller -> deleteSchool($schoolId);
       


    }

    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $schoolName = $_POST['school-name'];
    $schoolDescription = $_POST['school-description'];
    
    $image = $_POST['school-image'];
    
    $video = $_POST['school-video'];
    

    $options = new CreateSchoolOptions($schoolName, $schoolDescription, $image, $video);

    $controller->addSchool($options);

    header('Location: /authentication.php');
}

?>