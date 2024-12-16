<?php

require_once './config/database.php';

class HomeModel {
    private $conn;



    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function getOrcamentos($orcamento,$ano_insercao,$ano_prazo,$setor) {
        //atualiza os dados antes de enviar
        $this->atualizaSituacao();
        


        //consulta adiciona filtro por ano de vencimento
        $query = "SELECT 
        $orcamento.id_$orcamento AS id, 
        TO_CHAR($orcamento.prazo_entrega_gsi, 'MM/YYYY') AS prazo_entrega_gsi,
        $orcamento.descricao AS descricao,
        situacao.descricao AS situacao, 
        $orcamento.total_atraso AS total_atrasos, 
        $orcamento.total_ano, 
        $orcamento.id_situacao,
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
            setor_responsavel ON $orcamento.id_setor_responsavel = setor_responsavel.id_setor_responsavel
        JOIN 
            status ON $orcamento.id_status = status.id_status
        WHERE 1=1";
    
        if (!empty($ano_insercao)) {
            $query .= " AND $orcamento.ano_insercao = $ano_insercao";
        }
        
        if (!empty($ano_prazo)) {
            $query .= " AND EXTRACT(YEAR FROM $orcamento.prazo_entrega_gsi) = $ano_prazo";
        }
        
        if (!empty($setor)) {
            $query .= " AND setor_responsavel.descricao = '$setor'";
        }

        
        $query .= " ORDER BY $orcamento.total_ano DESC, $orcamento.prazo_entrega_gsi ASC;";
    

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

    public function updateOrcamentos($orcamento,$id,$processoSei,$situacao){
        $query = "UPDATE $orcamento 
            SET processo_sei='$processoSei',id_situacao='$situacao'
            WHERE id_$orcamento=$id";

        $result = pg_query($this->conn,$query);
        if(!$result){
            die("Erro no update: " . pg_last_error());
        }

    }




    //funções auxiliares

    //com base em arrays atualiza as tabelas caso estejam atrasadas ou em dia
    public function atualizaSituacao(){
        $tabelas = ['investimento', 'gasto'];
        
        $condicoes = [
            "SET id_situacao = 4 
            WHERE TO_CHAR(prazo_entrega_gsi, 'YYYY-MM') = TO_CHAR(CURRENT_DATE, 'YYYY-MM')
            AND processo_sei IS NULL
            AND id_status IN (1, 6, 2)",
    
            "SET id_situacao = 2 
            WHERE prazo_entrega_gsi < CURRENT_DATE
            AND processo_sei IS NULL
            AND id_status IN (1, 6, 2)"
        ];
    
        // Itera sobre cada tabela e aplica as condições
        foreach ($tabelas as $tabela) {
            foreach ($condicoes as $condicao) {
                $query = "UPDATE $tabela $condicao";
                $result = pg_query($this->conn, $query);
            }
        }    
    }
}
?>
