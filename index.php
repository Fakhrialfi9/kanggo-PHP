<?php
include_once 'controllers/Controller.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$controller = new Controller();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($_SESSION['flash_message'])) {
    echo "<div class='alert alert-success' id='flash-alert'>" . $_SESSION['flash_message'] . "</div>";
    unset($_SESSION['flash_message']);
}

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'add':
        $controller->add();
        break;
    case 'edit':
        $controller->edit($id);
        break;
    case 'save':
        $controller->save($_POST);
        break;
    case 'delete':
        $controller->delete($id);
        break;
    default:
        $controller->index();
        break;
}
?>
