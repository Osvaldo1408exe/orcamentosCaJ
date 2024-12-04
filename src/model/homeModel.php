<?php

require_once './config/database.php';

class HomeModel {
    private $conn;



    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function getOrcamentos($ano_insercao) {
        $data = date('Y');
        
        // Consulta SQL
        $query = "SELECT 
                    investimentos.id_investimento AS id, 
                    TO_CHAR(investimentos.prazo_entrega_gsi, 'MM/YYYY') AS prazo_entrega_gsi,
                    investimentos.descricao AS descricao,
                    situacao.descricao AS situacao, 
                    investimentos.total_atraso AS total_atrasos, 
                    investimentos.total_ano, 
                    grupo.descricao AS estrategico, 
                    setor_responsavel.descricao AS setor_responsavel, 
                    investimentos.total_contratado AS total_contratado, 
                    status.descricao AS status, 
                    investimentos.processo_sei, 
                    investimentos.total_desebolsos, 
                    TO_CHAR(investimentos.prazo_entrega_gsi, 'MM/yyyy') AS prazo_entrega_gsl_formatado, 
                    TO_CHAR(investimentos.data_primeiro_desembolso, 'MM/YYYY') AS primeiro_desembolso
                FROM 
                    investimentos
                JOIN 
                    situacao ON investimentos.id_situacao = situacao.id_situacao
                JOIN 
                    grupo ON investimentos.id_grupo = grupo.id_grupo
                JOIN 
                    setor_responsavel ON investimentos.id_setor_responsavel = setor_responsavel.id_setor_responsavel
                JOIN 
                    status ON investimentos.id_status = status.id_status
                WHERE 
                    investimentos.ano_insercao =  $ano_insercao
                ORDER BY 
                    investimentos.total_ano DESC, 
                    investimentos.prazo_entrega_gsi ASC;
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
