<?php
include_once 'components/header.php';

include_once 'helpers/database/database_controller.php';

include_once 'helpers/database/database_creator.php';

include_once 'features/login/login_modal.php';

$db = new DatabaseCreator();
$conn = $db->connectToDatabase();
$controller = new DatabaseController($conn);


$schoolId = $_GET["schoolId"];

if (isset($schoolId)) {
    $formations = $controller->getSchoolFormations($schoolId);
    $school = $controller->getSchool($schoolId);
}


$importPath = 'features/school_detaills';

include_once 'components/home_navbar.php';

include_once $importPath . '/school_intro.php';
include_once $importPath . '/school_offers.php';
include_once $importPath . '/school_contact.php';


?>