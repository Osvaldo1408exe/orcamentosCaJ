<?php
namespace App\Controller;

class HomeController {
    public function index() {
        // Exibe a página inicial após login
        require './src/view/home.php';
    }
}
?>
