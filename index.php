<?php
session_start();
use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\PlurianualController;

require_once './src/controller/loginController.php';
require_once './src/controller/homeController.php';
require_once './src/controller/plurianualController.php';
require_once './config/database.php';



//controlllers
$loginController = new LoginController();
$homeController = new HomeController($conn);
$plurianualController = new PlurianualController();




$action = isset($_GET['action']) ? $_GET['action'] : '';
$ano_execucao = isset($_GET['ano_execucao']) ? $_GET['ano_execucao'] : ''; 



switch ($action) {
    case 'login':
        $loginController->index();
        break;
    case 'home':
        $homeController->index($ano_execucao);
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