<?php


$panelId = $_GET['panelId'];
$root = $_SERVER['DOCUMENT_ROOT'] . '/features/admin';


switch($panelId){
    case 0 :
        include_once $root.'/admission_manager.php';
        break;

    case 1 :
        include_once $root.'/school_manager.php';
        break;

    case 2 :
        include_once $root.'/school_editor.php';
        break;    
}

?>