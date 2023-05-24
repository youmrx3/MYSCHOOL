<?php


$rootPath = $_SERVER['DOCUMENT_ROOT'];

include_once $rootPath . '/components/enable_error_logging.php';

include_once $rootPath . '/helpers/database/database_controller.php';

include_once $rootPath . '/helpers/database/database_creator.php';

include_once $rootPath . '/data/database_options.php';


$db = new DatabaseCreator();
$conn = $db->connectToDatabase();
$controller = new DatabaseController($conn);


$options = new LoginOptions($_POST['email'], $_POST['password']);

$user = $controller->loginUser($options);

if ($user != null) {
    echo "Login Success";

    return;
}


echo "Login Failed";


?>