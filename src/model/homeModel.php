<?php

require_once './config/database.php';

class HomeModel {
    private $conn;



    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function getOrcamentos($orcamento,$ano_insercao) {
        $data = date('Y');
        
        // Consulta SQL
        $query = "SELECT 
                    $orcamento.id_$orcamento AS id, 
                    TO_CHAR($orcamento.prazo_entrega_gsi, 'MM/YYYY') AS prazo_entrega_gsi,
                    $orcamento.descricao AS descricao,
                    situacao.descricao AS situacao, 
                    $orcamento.total_atraso AS total_atrasos, 
                    $orcamento.total_ano, 
                    grupo.descricao AS estrategico, 
                    setor_responsavel.descricao AS setor_responsavel, 
                    $orcamento.total_contratado AS total_contratado, 
                    status.descricao AS status, 
                    $orcamento.processo_sei,  
                    TO_CHAR($orcamento.prazo_entrega_gsi, 'MM/yyyy') AS prazo_entrega_gsl_formatado, 
                    TO_CHAR($orcamento.data_primeiro_desembolso, 'MM/YYYY') AS primeiro_desembolso
                FROM 
                    $orcamento
                JOIN 
                    situacao ON $orcamento.id_situacao = situacao.id_situacao
                JOIN 
                    grupo ON $orcamento.id_grupo = grupo.id_grupo
                JOIN 
                    setor_responsavel ON $orcamento.id_setor_responsavel = setor_responsavel.id_setor_responsavel
                JOIN 
                    status ON $orcamento.id_status = status.id_status
                WHERE 
                    $orcamento.ano_insercao = $ano_insercao
                     

                ORDER BY 
                    $orcamento.total_ano DESC, 
                    $orcamento.prazo_entrega_gsi ASC;
                ";

        $result = pg_query($this->conn, $query);

        if (!$result) {
            die("Erro na consulta ao banco de dados: " . pg_last_error());
        }

        // Armazenar os resultados em um array
        $orcamentos = [];
        while ($row = pg_fetch_assoc($result)) {
            $orcamentos[] = $row;
        }

        return $orcamentos;
    }
}
?>
