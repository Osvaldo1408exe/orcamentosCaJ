<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/tabela.css">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="./public/js/tabela.js"></script>
    <title>Orçamentos CAJ</title>
</head>
<body>
    <?php require_once 'src/includes/header.php'?>
    
    



    <div class="table-container">
    <table id="tabela" class="table table-bordered table-hover">
        <thead class="thead-dark thead-fixed">
            <tr>
                <th class="col text-center">Prazo GSL</th>
                <th class="col text-center">Responsável</th>
                <th class="col text-center">Investimento</th>
                <th class="col text-center">Situação</th>
                <th class="col text-center">1° Desembolso</th>
                <th class="col text-center">Total <?php echo date('Y');?></th>
                <th class="col text-center">Custo do atraso</th>
                <th class="col text-center">Processo SEI</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($orcamentos)): ?>
                <tr>
                    <td colspan="8" class="text-center">Nenhum registro encontrado para esse ano de execução</td>
                </tr>
            <?php else: ?>
                <?php foreach ($orcamentos as $orcamento): ?>
                    <tr>
                        <td><?php echo $orcamento['prazo_entrega_gsi']; ?></td>
                        <td><?php echo $orcamento['setor_responsavel']; ?></td>
                        <td><?php echo $orcamento['descricao']; ?></td>
                        <td><?php echo $orcamento['situacao']; ?></td>
                        <td><?php echo $orcamento['primeiro_desembolso']; ?></td>
                        <td><?php echo $orcamento['total_ano']; ?></td>
                        <td><?php echo $orcamento['total_atrasos']; ?></td>
                        <td><?php echo $orcamento['processo_sei']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

    <!-- Modal de Edição -->
    <div class="modal" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-center">Editar</h5>
                </div>
                <div class="modal-body">
                    <form id="formEdicao" action="db_update_home.php" method="post">
                        <input type="hidden" id="edit-id" name="id">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="strategic">
                            <label class="form-check-label" for="strategic">Item estratégico</label>
                        </div>
                        <div class="form-group">
                            <label for="edit-processo_sei">Processo SEI</label>
                            <input type="text" class="form-control" id="edit-processo_sei" name="processo_sei">
                        </div>
                        <div class="form-group">
                            <label for="edit-situacao">Situação:</label>
                            <select type="text" class="form-control" id="edit-situacao" name="situacao">
                                <!-- As opções serão inseridas aqui com JavaScript -->
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="fechar-edicao" data-dismiss="modal">Fechar</button>
                            <button type="submit" id="salvar-edicao">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   

    
</body>
</html>