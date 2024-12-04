<link rel="stylesheet" href="./public/css/header.css">
<script src="./public/js/header.js"></script>


</style>
<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="/orcamentosCaJ">Investimentos</a>
    <button class="navbar-toggler" onclick="toggleNavbar()" aria-label="Toggle navigation" aria-expanded="false">
      <span>☰</span>
    </button>
    <div class="navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/orcamentosCaJ">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Estratégico</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://orcamentoscaj/estrategico/2023.php">2023</a></li>
            <li><a class="dropdown-item" href="http://orcamentoscaj/estrategico/2024.php">2024</a></li>
            <li><a class="dropdown-item" href="http://orcamentoscaj/estrategico/2025.php">2025</a></li>
            <li><a class="dropdown-item" href="http://orcamentoscaj/estrategico/2026.php">2026</a></li>
            <li><a class="dropdown-item" href="http://orcamentoscaj/estrategico/2027.php">2027</a></li>
            <li><a class="dropdown-item" href="http://orcamentoscaj/estrategico/2028.php">2028</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Desembolsos</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://orcamentoscaj/desembolsos/setor/ann.php">ANN</a></li>
            <li><a class="dropdown-item" href="http://orcamentoscaj/desembolsos/setor/ciop.php">CIOP</a></li>
            <li><a class="dropdown-item" href="http://orcamentoscaj/desembolsos/setor/cme.php">CME</a></li>
            <li><a class="dropdown-item" href="http://orcamentoscaj/desembolsos/setor/gag.php">GAG</a></li>
            <!-- Restante dos itens -->
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Ano</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://orcamentoscaj/desembolsos/ano/semprazo.php">Sem prazo de entrega</a></li>
            <li><a class="dropdown-item" href="http://orcamentoscaj/desembolsos/ano/2023.php">2023</a></li>
            <!-- Restante dos anos -->
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Dashboards</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://app.powerbi.com/groups/me/reports/030b4318-6688-436a-88c7-be4515886cd0/ReportSection?experience=power-bi" target="_blank">Painel Licitações</a></li>
            <li><a class="dropdown-item disabled" href="#">Painel 2</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="http://orcamentoscaj/gastos/home.php">Ir para: Gastos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="http://orcamentoscaj/help.php">Help</a>
        </li>

        <li class="nav-item">
          <form method="post" action="logout.php">
            <button id="cacheBtn" class="nav-link">Sair</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
