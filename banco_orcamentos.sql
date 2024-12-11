CREATE TABLE "investimentos"(
    "id_investimento" SERIAL,
    "id_diretoria" INTEGER  ,
    "prazo_entrega_gsi" DATE NULL,
    "id_centro_custo" INTEGER   ,
    "id_setor_responsavel" INTEGER  ,
    "id_conta_contabil" INTEGER ,
    "id_grupo" INTEGER  ,
    "descricao" VARCHAR(250)    ,
    "id_status" INTEGER ,
    "data_reajuste" DATE ,
    "numero_documento" VARCHAR(80) ,
    "data_primeiro_desembolso" DATE  ,
    "processo_sei" VARCHAR(20) ,
    "total_desebolsos" FLOAT(53),
    "id_situacao" INTEGER ,
    "total_atraso" FLOAT(53),
    "total_ano" FLOAT(53) ,
    "total_contratado" FLOAT(53) ,
    "valor_em_dia" FLOAT(53) ,
    "data_atrasado_em_dia" DATE  ,
    "data_calculo_atraso" DATE  ,
    "ano_insercao" INTEGER CHECK (ano_insercao >= 2023 AND ano_insercao <= 2100),
    "ativo" CHAR(1)  DEFAULT 's'

);
ALTER TABLE
    "investimentos" ADD PRIMARY KEY("id_investimento");
CREATE TABLE "diretoria"(
    "id_diretoria" SERIAL   ,
    "descricao" VARCHAR(25) ,
    "ativo" CHAR(1)  DEFAULT 's'
);
ALTER TABLE
    "diretoria" ADD PRIMARY KEY("id_diretoria");
CREATE TABLE "centro_custo"(
    "id_centro_custo" SERIAL    ,
    "codigo" INTEGER    ,
    "descricao" VARCHAR(50) ,
    "ativo" CHAR(1)  DEFAULT 's'
);
ALTER TABLE
    "centro_custo" ADD PRIMARY KEY("id_centro_custo");
CREATE TABLE "setor_responsavel"(
    "id_setor_responsavel" SERIAL   ,
    "descricao" VARCHAR(15) ,
    "ativo" CHAR(1)  DEFAULT 's'
);
ALTER TABLE
    "setor_responsavel" ADD PRIMARY KEY("id_setor_responsavel");
CREATE TABLE "grupo"(
    "id_grupo" SERIAL   ,
    "descricao" VARCHAR(100)    ,
    "ativo" CHAR(1)  DEFAULT 's'
);
ALTER TABLE
    "grupo" ADD PRIMARY KEY("id_grupo");
CREATE TABLE "conta_contabil"(
    "id_conta_contabil" SERIAL  ,
    "descricao" VARCHAR(80) ,
    "ativo" CHAR(1)  DEFAULT 's'
);
ALTER TABLE
    "conta_contabil" ADD PRIMARY KEY("id_conta_contabil");
CREATE TABLE "status"(
    "id_status" SERIAL  ,
    "descricao" VARCHAR(30) ,
    "ativo" CHAR(1)  DEFAULT 's'
);
ALTER TABLE
    "status" ADD PRIMARY KEY("id_status");
CREATE TABLE "situacao"(
    "id_situacao" SERIAL    ,
    "descricao" VARCHAR(30) ,
    "ativo" CHAR(1)  DEFAULT 's'
);
ALTER TABLE
    "situacao" ADD PRIMARY KEY("id_situacao");
CREATE TABLE "alteracoes"(
    "id_alteracoes" SERIAL  ,
    "usuario" VARCHAR(30)   ,
    "data_alteracao" DATE   ,
    "id_item" INTEGER   ,
    "tipo_item" VARCHAR(15) 
);
ALTER TABLE
    "alteracoes" ADD PRIMARY KEY("id_alteracoes");

 CREATE TABLE "gasto"(
    "id_gasto" SERIAL   ,
    "id_diretoria" INTEGER  ,
    "id_centro_custo" INTEGER   ,
    "prazo_entrega_gsi" DATE NULL,
    "id_setor_responsavel" INTEGER  ,
    "id_grupo" INTEGER  ,
    "descricao" VARCHAR(250)    ,
    "id_status" INTEGER ,
    "numero_documento" VARCHAR(80) ,
    "data_reajuste" DATE ,
    "data_primeiro_desembolso" DATE  ,
    "id_situacao" INTEGER ,
    "processo_sei" VARCHAR(20) ,
    "total_atraso" FLOAT(53),
    "data_calculo_atraso" DATE  ,
    "total_ano" FLOAT(53) ,
    "total_contratado" FLOAT(53) ,
    "ano_insercao" INTEGER CHECK (ano_insercao >= 2023 AND ano_insercao <= 2100),
    "ativo" CHAR(1)  DEFAULT 's'

    );
ALTER TABLE
    "gastos" ADD PRIMARY KEY("id_gasto");
CREATE TABLE "desembolso_gasto"(
    "id_desembolso" SERIAL  ,
    "id_gasto" INTEGER  ,
    "data_desembolso" DATE  ,
    "valor" FLOAT(53)   
);
ALTER TABLE
    "desembolso_gastos" ADD PRIMARY KEY("id_desembolso");
CREATE TABLE "desembolso_investimento"(
    "id_desembolso" SERIAL  ,
    "id_investimento" INTEGER   ,
    "data_desembolso" DATE  ,
    "valor" FLOAT(53)   
);
ALTER TABLE
    "desembolso_investimentos" ADD PRIMARY KEY("id_desembolso");
CREATE TABLE "logs"(
    "id_logs" SERIAL    ,
    "usuario" VARCHAR(30)   ,
    "data_entrada" DATE 
);
ALTER TABLE
    "logs" ADD PRIMARY KEY("id_logs");
ALTER TABLE
    "investimento" ADD CONSTRAINT "investimentos_id_centro_custo_foreign" FOREIGN KEY("id_centro_custo") REFERENCES "centro_custo"("id_centro_custo");
ALTER TABLE
    "investimento" ADD CONSTRAINT "investimentos_id_setor_responsavel_foreign" FOREIGN KEY("id_setor_responsavel") REFERENCES "setor_responsavel"("id_setor_responsavel");
ALTER TABLE
    "investimento" ADD CONSTRAINT "investimentos_id_status_foreign" FOREIGN KEY("id_status") REFERENCES "status"("id_status");
ALTER TABLE
    "investimento" ADD CONSTRAINT "investimentos_id_grupo_foreign" FOREIGN KEY("id_grupo") REFERENCES "grupo"("id_grupo");
ALTER TABLE
    "desembolso_investimentos" ADD CONSTRAINT "desembolso_investimentos_id_desembolso_foreign" FOREIGN KEY("id_desembolso") REFERENCES "investimentos"("id_investimento");
ALTER TABLE
    "investimento" ADD CONSTRAINT "investimentos_id_conta_contabil_foreign" FOREIGN KEY("id_conta_contabil") REFERENCES "conta_contabil"("id_conta_contabil");
ALTER TABLE
    "gasto" ADD CONSTRAINT "gastos_id_setor_responsavel_foreign" FOREIGN KEY("id_setor_responsavel") REFERENCES "setor_responsavel"("id_setor_responsavel");
ALTER TABLE
    "gasto" ADD CONSTRAINT "gastos_id_situacao_foreign" FOREIGN KEY("id_situacao") REFERENCES "situacao"("id_situacao");
ALTER TABLE
    "investimento" ADD CONSTRAINT "investimentos_id_contrato_foreign" FOREIGN KEY("id_contrato") REFERENCES "contrato"("id_contrato");
ALTER TABLE
    "gasto" ADD CONSTRAINT "gastos_id_status_foreign" FOREIGN KEY("id_status") REFERENCES "status"("id_status");
ALTER TABLE
    "gasto" ADD CONSTRAINT "gastos_id_centro_custo_foreign" FOREIGN KEY("id_centro_custo") REFERENCES "centro_custo"("id_centro_custo");
ALTER TABLE
    "alteracoes" ADD CONSTRAINT "alteracoes_id_alteracoes_foreign" FOREIGN KEY("id_alteracoes") REFERENCES "gastos"("id_gasto");
ALTER TABLE
    "alteracoes" ADD CONSTRAINT "alteracoes_id_alteracoes_foreign" FOREIGN KEY("id_alteracoes") REFERENCES "investimentos"("id_investimento");
ALTER TABLE
    "gasto" ADD CONSTRAINT "gastos_id_grupo_foreign" FOREIGN KEY("id_grupo") REFERENCES "grupo"("id_grupo");
ALTER TABLE
    "gasto" ADD CONSTRAINT "gastos_id_diretoria_foreign" FOREIGN KEY("id_diretoria") REFERENCES "diretoria"("id_diretoria");
ALTER TABLE
    "gasto" ADD CONSTRAINT "gastos_id_conta_contabil_foreign" FOREIGN KEY("id_conta_contabil") REFERENCES "conta_contabil"("id_conta_contabil");
ALTER TABLE
    "investimento" ADD CONSTRAINT "investimentos_id_situacao_foreign" FOREIGN KEY("id_situacao") REFERENCES "situacao"("id_situacao");
ALTER TABLE
    "gasto" ADD CONSTRAINT "gastos_id_contrato_foreign" FOREIGN KEY("id_contrato") REFERENCES "contrato"("id_contrato");
ALTER TABLE
    "desembolso_gastos" ADD CONSTRAINT "desembolso_gastos_id_gasto_foreign" FOREIGN KEY("id_gasto") REFERENCES "gastos"("id_gasto");
ALTER TABLE
    "investimento" ADD CONSTRAINT "investimentos_id_diretoria_foreign" FOREIGN KEY("id_diretoria") REFERENCES "diretoria"("id_diretoria");