<link rel="stylesheet" href="./public/css/header.css">
<script src="./public/js/header.js"></script>


</style>
<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php?action=plurianual&orcamento=investimento&ano_execucao=2024">Investimentos</a>
    <button class="navbar-toggler" onclick="toggleNavbar()" aria-label="Toggle navigation" aria-expanded="false">
      <span>☰</span>
    </button>
    <div class="navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav">

      <?php if($_GET['orcamento'] == 'investimento'):?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Ano</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>">Sem prazo de entrega</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2023">2023</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2024">2024</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2025">2025</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2026">2026</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2027">2027</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2028">2028</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=investimento&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2029">2029</a></li>
            
            <!-- Restante dos anos -->
          </ul>
        </li>

        <?php else:?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Ano</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>">Sem prazo de entrega</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2023">2023</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2024">2024</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2025">2025</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2026">2026</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2027">2027</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2028">2028</a></li>
            <li><a class="dropdown-item" href="./index.php?action=home&orcamento=gasto&ano_execucao=<?php echo $_GET['ano_execucao']?>&ano_prazo=2029">2029</a></li>
            
            <!-- Restante dos anos -->
          </ul>
        </li>     
        <?php endif?>
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Desembolsos</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/ciop.php">CIOP</a></li>
              <li><a class="dropdown-item" href="/cme.php">CME</a></li>
              <li><a class="dropdown-item" href="/gag.php">GAG</a></li>
              <li><a class="dropdown-item" href="/ges.php">GES</a></li>
              <li><a class="dropdown-item" href="/gex.php">GEX</a></li>
              <li><a class="dropdown-item" href="/gfc.php">GFC</a></li>
              <li><a class="dropdown-item" href="/gms.php">GMS</a></li>
              <li><a class="dropdown-item" href="/gqm.php">GQM</a></li>
              <li><a class="dropdown-item" href="/gri.php">GRI</a></li>
              <li><a class="dropdown-item" href="/gsl.php">GSL</a></li>
              <li><a class="dropdown-item" href="/gti.php">GTI</a></li>
                
            <!-- Restante dos itens -->
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#">Dashboards</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://app.powerbi.com/groups/me/reports/030b4318-6688-436a-88c7-be4515886cd0/ReportSection?experience=power-bi" target="_blank">Painel Licitações</a></li>
          </ul>
        </li>

        <?php if($_GET['orcamento'] == 'investimento'):?>
          <li class="nav-item">
            <a class="nav-link" href="./index.php?action=home&orcamento=gasto&ano_execucao=2024">Ir para: Gastos</a>
          </li>

        <?php else:?>
          <li class="nav-item">
            <a class="nav-link" href="./index.php?action=home&orcamento=investimento&ano_execucao=2024">Ir para: Investimentos</a>
          </li>

        
        <?php endif?>


        



        <li class="nav-item">
          <a class="nav-link" href="">Help</a>
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
