<script src="https://kit.fontawesome.com/02c9a8c57e.js" crossorigin="anonymous"></script>
<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';  // Inclua o autoload do Composer

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);  // Carregar o arquivo .env
$dotenv->load();  // Carregar as variáveis de ambiente do arquivo .env

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
$orcamento = isset($_GET['orcamento']) ? $_GET['orcamento'] : ''; 





switch ($action) {
    case 'login':
        $loginController->index();
        break;
    case 'home':
        $homeController->index($orcamento ,$ano_execucao);
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