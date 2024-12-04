<?php
namespace App\Controller;

use HomeModel;

require_once './src/model/homeModel.php';
require_once './config/database.php';

class HomeController {
    private $model;

    public function __construct($dbConn) {
        $this->model = new HomeModel($dbConn); 
    }


    public function index($ano_insercao) {

        $orcamentos = $this->model->getOrcamentos($ano_insercao);
        // Exibe a página inicial após login
        require './src/view/home.php';
    }
}
?>
