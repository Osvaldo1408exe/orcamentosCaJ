CREATE TABLE "investimentos"(
    "id_investimento" SERIAL,
    "id_diretoria" INTEGER NOT NULL,
    "id_centro_custo" INTEGER NOT NULL,
    "prazo_entrega_gsi" DATE NULL,
    "id_setor_responsavel" INTEGER NOT NULL,
    "id_grupo" INTEGER NOT NULL,
    "id_conta_contabil" INTEGER NOT NULL,
    "descricao" VARCHAR(250) NOT NULL,
    "id_contrato" INTEGER NOT NULL,
    "id_status" INTEGER NOT NULL,
    "numero_documento" VARCHAR(80) NULL,
    "data_reajuste" DATE NULL,
    "data_primeiro_desembolso" DATE NOT NULL,
    "id_situacao" INTEGER NOT NULL,
    "processo_sei" VARCHAR(20) NULL,
    "total_atraso" FLOAT(53) NOT NULL,
    "estrategico" CHAR(1) NULL,
    "data_calculo_atraso" DATE NOT NULL,
    "total_ano" FLOAT(53) NULL,
    "total_contratado" FLOAT(53) NULL,
    "ano_insercao" INTEGER CHECK (ano_insercao >= 2023 AND ano_insercao <= 2100),
    "ativo" CHAR(1) NOT NULL DEFAULT 's'

);
ALTER TABLE
    "investimentos" ADD PRIMARY KEY("id_investimento");
CREATE TABLE "diretoria"(
    "id_diretoria" SERIAL NOT NULL,
    "descricao" VARCHAR(15) NOT NULL,
    "ativo" CHAR(1) NOT NULL DEFAULT 's'
);
ALTER TABLE
    "diretoria" ADD PRIMARY KEY("id_diretoria");
CREATE TABLE "centro_custo"(
    "id_centro_custo" SERIAL NOT NULL,
    "codigo" INTEGER NOT NULL,
    "descricao" VARCHAR(15) NOT NULL,
    "ativo" CHAR(1) NOT NULL DEFAULT 's'
);
ALTER TABLE
    "centro_custo" ADD PRIMARY KEY("id_centro_custo");
CREATE TABLE "setor_responsavel"(
    "id_setor_responsavel" SERIAL NOT NULL,
    "descricao" VARCHAR(15) NOT NULL,
    "ativo" CHAR(1) NOT NULL DEFAULT 's'
);
ALTER TABLE
    "setor_responsavel" ADD PRIMARY KEY("id_setor_responsavel");
CREATE TABLE "grupo"(
    "id_grupo" SERIAL NOT NULL,
    "descricao" VARCHAR(100) NOT NULL,
    "ativo" CHAR(1) NOT NULL DEFAULT 's'
);
ALTER TABLE
    "grupo" ADD PRIMARY KEY("id_grupo");
CREATE TABLE "conta_contabil"(
    "id_conta_contabil" SERIAL NOT NULL,
    "descricao" VARCHAR(80) NOT NULL,
    "ativo" CHAR(1) NOT NULL DEFAULT 's'
);
ALTER TABLE
    "conta_contabil" ADD PRIMARY KEY("id_conta_contabil");
CREATE TABLE "contrato"(
    "id_contrato" SERIAL NOT NULL,
    "descricao" VARCHAR(40) NOT NULL,
    "ativo" CHAR(1) NOT NULL DEFAULT 's'
);
ALTER TABLE
    "contrato" ADD PRIMARY KEY("id_contrato");
CREATE TABLE "status"(
    "id_status" SERIAL NOT NULL,
    "descricao" VARCHAR(30) NOT NULL,
    "ativo" CHAR(1) NOT NULL DEFAULT 's'
);
ALTER TABLE
    "status" ADD PRIMARY KEY("id_status");
CREATE TABLE "situacao"(
    "id_situacao" SERIAL NOT NULL,
    "descricao" VARCHAR(30) NOT NULL,
    "ativo" CHAR(1) NOT NULL DEFAULT 's'
);
ALTER TABLE
    "situacao" ADD PRIMARY KEY("id_situacao");
CREATE TABLE "alteracoes"(
    "id_alteracoes" SERIAL NOT NULL,
    "usuario" VARCHAR(30) NOT NULL,
    "data_alteracao" DATE NOT NULL,
    "id_item" INTEGER NOT NULL,
    "tipo_item" VARCHAR(15) NOT NULL
);
ALTER TABLE
    "alteracoes" ADD PRIMARY KEY("id_alteracoes");
CREATE TABLE "gastos"(
    "id_gasto" SERIAL NOT NULL,
    "id_diretoria" INTEGER NOT NULL,
    "id_centro_custo" INTEGER NOT NULL,
    "prazo_entrega_gsi" DATE NULL,
    "id_setor_responsavel" INTEGER NOT NULL,
    "id_grupo" INTEGER NOT NULL,
    "id_conta_contabil" INTEGER NOT NULL,
    "descricao" VARCHAR(250) NOT NULL,
    "id_contrato" INTEGER NOT NULL,
    "id_status" INTEGER NOT NULL,
    "numero_documento" VARCHAR(80) NULL,
    "data_reajuste" DATE NULL,
    "data_primeiro_desembolso" DATE NOT NULL,
    "id_situacao" INTEGER NOT NULL,
    "processo_sei" VARCHAR(20) NULL,
    "total_atraso" FLOAT(53) NOT NULL,
    "estrategico" CHAR(1) NULL,
    "data_calculo_atraso" DATE NOT NULL,
    "total_ano" FLOAT(53) NULL,
    "total_contratado" FLOAT(53) NULL,
    "ano_insercao" INTEGER CHECK (ano_insercao >= 2023 AND ano_insercao <= 2100)
);
ALTER TABLE
    "gastos" ADD PRIMARY KEY("id_gasto");
CREATE TABLE "desembolso_gastos"(
    "id_desembolso" SERIAL NOT NULL,
    "id_gasto" INTEGER NOT NULL,
    "data_desembolso" DATE NOT NULL,
    "valor" FLOAT(53) NOT NULL
);
ALTER TABLE
    "desembolso_gastos" ADD PRIMARY KEY("id_desembolso");
CREATE TABLE "desembolso_investimentos"(
    "id_desembolso" SERIAL NOT NULL,
    "id_investimento" INTEGER NOT NULL,
    "data_desembolso" DATE NOT NULL,
    "valor" FLOAT(53) NOT NULL
);
ALTER TABLE
    "desembolso_investimentos" ADD PRIMARY KEY("id_desembolso");
CREATE TABLE "logs"(
    "id_logs" SERIAL NOT NULL,
    "usuario" VARCHAR(30) NOT NULL,
    "data_entrada" DATE NOT NULL
);
ALTER TABLE
    "logs" ADD PRIMARY KEY("id_logs");
ALTER TABLE
    "investimentos" ADD CONSTRAINT "investimentos_id_centro_custo_foreign" FOREIGN KEY("id_centro_custo") REFERENCES "centro_custo"("id_centro_custo");
ALTER TABLE
    "investimentos" ADD CONSTRAINT "investimentos_id_setor_responsavel_foreign" FOREIGN KEY("id_setor_responsavel") REFERENCES "setor_responsavel"("id_setor_responsavel");
ALTER TABLE
    "investimentos" ADD CONSTRAINT "investimentos_id_status_foreign" FOREIGN KEY("id_status") REFERENCES "status"("id_status");
ALTER TABLE
    "investimentos" ADD CONSTRAINT "investimentos_id_grupo_foreign" FOREIGN KEY("id_grupo") REFERENCES "grupo"("id_grupo");
ALTER TABLE
    "desembolso_investimentos" ADD CONSTRAINT "desembolso_investimentos_id_desembolso_foreign" FOREIGN KEY("id_desembolso") REFERENCES "investimentos"("id_investimento");
ALTER TABLE
    "investimentos" ADD CONSTRAINT "investimentos_id_conta_contabil_foreign" FOREIGN KEY("id_conta_contabil") REFERENCES "conta_contabil"("id_conta_contabil");
ALTER TABLE
    "gastos" ADD CONSTRAINT "gastos_id_setor_responsavel_foreign" FOREIGN KEY("id_setor_responsavel") REFERENCES "setor_responsavel"("id_setor_responsavel");
ALTER TABLE
    "gastos" ADD CONSTRAINT "gastos_id_situacao_foreign" FOREIGN KEY("id_situacao") REFERENCES "situacao"("id_situacao");
ALTER TABLE
    "investimentos" ADD CONSTRAINT "investimentos_id_contrato_foreign" FOREIGN KEY("id_contrato") REFERENCES "contrato"("id_contrato");
ALTER TABLE
    "gastos" ADD CONSTRAINT "gastos_id_status_foreign" FOREIGN KEY("id_status") REFERENCES "status"("id_status");
ALTER TABLE
    "gastos" ADD CONSTRAINT "gastos_id_centro_custo_foreign" FOREIGN KEY("id_centro_custo") REFERENCES "centro_custo"("id_centro_custo");
ALTER TABLE
    "alteracoes" ADD CONSTRAINT "alteracoes_id_alteracoes_foreign" FOREIGN KEY("id_alteracoes") REFERENCES "gastos"("id_gasto");
ALTER TABLE
    "alteracoes" ADD CONSTRAINT "alteracoes_id_alteracoes_foreign" FOREIGN KEY("id_alteracoes") REFERENCES "investimentos"("id_investimento");
ALTER TABLE
    "gastos" ADD CONSTRAINT "gastos_id_grupo_foreign" FOREIGN KEY("id_grupo") REFERENCES "grupo"("id_grupo");
ALTER TABLE
    "gastos" ADD CONSTRAINT "gastos_id_diretoria_foreign" FOREIGN KEY("id_diretoria") REFERENCES "diretoria"("id_diretoria");
ALTER TABLE
    "gastos" ADD CONSTRAINT "gastos_id_conta_contabil_foreign" FOREIGN KEY("id_conta_contabil") REFERENCES "conta_contabil"("id_conta_contabil");
ALTER TABLE
    "investimentos" ADD CONSTRAINT "investimentos_id_situacao_foreign" FOREIGN KEY("id_situacao") REFERENCES "situacao"("id_situacao");
ALTER TABLE
    "gastos" ADD CONSTRAINT "gastos_id_contrato_foreign" FOREIGN KEY("id_contrato") REFERENCES "contrato"("id_contrato");
ALTER TABLE
    "desembolso_gastos" ADD CONSTRAINT "desembolso_gastos_id_gasto_foreign" FOREIGN KEY("id_gasto") REFERENCES "gastos"("id_gasto");
ALTER TABLE
    "investimentos" ADD CONSTRAINT "investimentos_id_diretoria_foreign" FOREIGN KEY("id_diretoria") REFERENCES "diretoria"("id_diretoria");