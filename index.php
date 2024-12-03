<?php

use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\PlurianualController;

session_start();
require_once './src/controller/loginController.php';
require_once './src/controller/homeController.php';
require_once './src/controller/plurianualController.php';





$action = isset($_GET['action']) ? $_GET['action'] : '';

//controlllers
$loginController = new LoginController();
$homeController = new HomeController();
$plurianualController = new PlurianualController();




switch ($action) {
    case 'login':
        $loginController->index();
        break;
    case 'logout':
        $homeController->index();
        break;
    case 'plurianual':
        $plurianualController->index();
        break;
    default:
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit();
        }

}
?>