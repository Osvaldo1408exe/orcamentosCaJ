<script src="https://kit.fontawesome.com/02c9a8c57e.js" crossorigin="anonymous"></script>
<?php
session_start();

use App\Controller\DesembolsosController;
use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\PlurianualController;

require_once './src/controller/loginController.php';
require_once './src/controller/homeController.php';
require_once './src/controller/desembolsosController.php';
require_once './src/controller/plurianualController.php';
require_once './config/database.php';



//controlllers
$loginController = new LoginController();
$homeController = new HomeController($conn);
$plurianualController = new PlurianualController();
$desembolsoController = new DesembolsosController($conn);




$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : ''; 
$ano_execucao = isset($_GET['ano_execucao']) ? $_GET['ano_execucao'] : ''; 
$ano_prazo = isset($_GET['ano_prazo']) ? $_GET['ano_prazo'] : ''; 
$orcamento = isset($_GET['orcamento']) ? $_GET['orcamento'] : ''; 





switch ($action) {
    case 'login':
        $loginController->index();
        break;
    case 'home':
        $homeController->index($orcamento ,$ano_execucao,$ano_prazo);
        break;
    case 'update':
        $homeController->route('update');
        break;
    case 'desembolsos':
        $desembolsoController->index($orcamento,$id);
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