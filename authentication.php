<?php


$rootPath = $_SERVER['DOCUMENT_ROOT'];

include_once $rootPath . '/components/enable_error_logging.php';

include_once $rootPath . '/helpers/database/database_controller.php';

include_once $rootPath . '/helpers/database/database_creator.php';

include_once $rootPath . '/data/database_options.php';

include_once $rootPath . '/components/header.php';


$db = new DatabaseCreator();
$conn = $db->connectToDatabase();
$controller = new DatabaseController($conn);


$options = new LoginOptions($_POST['email'], $_POST['password']);

$user = $controller->loginUser($options);


if ($user != null) {

    $message = 'Bienvenue ' . $user->name . ' Vos Inscriptions';
    echo '<section id="Les-écoles-disponibles">
            <h1 class="title">' . $message . '</h1>
            <div class="content">
    ';

    include_once $rootPath . '/features/login/user_subscribtions.php';

    echo '</div>
        </section>';

    return;
}


echo "Login Failed";


?>