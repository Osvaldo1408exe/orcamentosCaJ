<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/ajuda.css">

    <title>Orçamentos CAJ</title>
</head>
<body>

    <!-- header -->
    <?php require_once 'src/includes/header.php'?>

    <div class="container mt-5">
        <p class="titulo"><span><strong>Orientações sobre as informações e funcionalidades do sistema de controle de processos a serem entregues na GSL.</strong></span></p>
        
        <p>&nbsp;</p>

        <p>Os dados foram importados da planilha de <strong>orçamento 2024 - 2028</strong>, fornecida pela GFI.</p>

        <p>A coluna "<strong>Situação</strong>" da planilha foi mantida, porém não está visível.</p>

        <p>Uma nova coluna "<strong>Status</strong>" foi adicionada com as seguintes opções:</p>

        <ul class="lista-status">
            <li class="nao-iniciado">Não iniciado</li>
            <li class="em-dia">Em dia</li>
            <li class="atrasado">Atrasado</li>
            <li class="contratado">Contratado</li>
        </ul>

        <p>
            "<strong>Não iniciado</strong>" = (sem cor) = Processos dos mês seguinte em diante que não foram iniciados.<br />
            "<strong>Em dia</strong>" = (Amarelo) = Processos do mês atual.<br />
            "<strong>Atrasado</strong>" = (Vermelho) = Processos do mês anterior ou mais antigos que não foram iniciados.<br />
            "<strong>Contratado</strong>" = (Azul) = Processos que já foram contratados.<br />
            <br />
            Uma rotina diária é executada às 00:00hs e atualiza o status de "<strong>não iniciado</strong>" para "<strong>atrasado</strong>" quando o prazo de entrega na GSL (mês) não foi atendido.<br />
            Cada gestor poderá alterar o status de "<strong>não iniciado</strong>" para "<strong>em dia</strong>" mediante a informação do processo SEI.<br />
            Processos com status "<strong>em dia</strong>", que são referentes ao mês corrente e que não foi informado o processo SEI passarão automaticamente para "<strong>atrasado</strong>" no primeiro dia do mês seguinte.<br />
            Para processos sem necessidade de licitação poderá ser informado número SEI 00.0.000000-0.<br />
            O painel (BI) tem duas visões. Uma com foco no prazo de entrega dos processos na GSL e outra com foco na data de desembolso (GFI).
        </p>

        <p>&nbsp;</p>
    </div>

    
</body>
</html>