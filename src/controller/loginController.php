<?php
namespace App\Controller;

class LoginController {
    public function index() {
        // Exibe a página inicial após login
        require './src/view/login.php';
    }
}
?>
