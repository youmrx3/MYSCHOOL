<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];

include_once $rootPath . '/components/enable_error_logging.php';

include_once $rootPath . '/helpers/database/database_controller.php';

include_once $rootPath . '/helpers/database/database_creator.php';

include_once $rootPath . '/data/database_options.php';


$db = new DatabaseCreator();
$conn = $db->connectToDatabase();
$controller = new DatabaseController($conn);


$options = new RegisterPendingApplicationOptions(
    $_POST['nom'],
    $_POST['objet'],
    $_POST['email'],
    $_POST['commentaire'],
    $_POST['numero'],
    $_POST['date'],
    $_POST['autres']
);


$controller->RegisterPendingApplication($options);


echo "Application Sent Wait For Admin Approval";


?>