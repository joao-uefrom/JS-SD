<?php

class Regra
{

    public function verificarPermissao($id_grupo, $id_modulo, $id_acao)
    {
        $sql = "SELECT * FROM tabela_operacao INNER JOIN tabela_modulos 
    ON tablela_modulos.id_modulos=tabela_operacao.fk_id_permissao WHERE tabela_modulos.diretorio = '$id_modulo'
    AND tabela_permissao.acao = '$id_acao' AND tebela_operacao.fk_id_grupo = '$id_grupo' ";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $rg = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($rg) {
            return true;
        }
        return false;
        foreach ($modulos as $modulo) {
            $permissao = Permissao::listar();
            if ($permissao) {
                foreach ($permissoes as $permissao) {

                }
            }
        }
        if (isset($_POST['atualizarPermissao']) && $_POST['atualizarPermissao'] == 'salvar') {
            $listarPermissao = $_POST['listarPermissao'];
            foreach ($listarPermissao as $itemPermissao) {
                $item = explode('-', $itemPermissao);
                $id_grupo = $item[0];
                $modulo = $item[1];
                $permissao = $item[2];

                $add = new Operacao();
                $add->setfk_id_grupo($grupo);
                $add->setfk_id_modulo($modulo);
                $add->setfk_id_permissao($permissao);
                $add->adicinar();
            }
        }
    }

    function adicionar()
    {
        $sql = "INSERT INTO tabela_operacao(fk_id_grupo, fk_id_modulo, fk_id_permissao) values (:fk_id_grupo, :fk_id_modulo, :fk_id_permissao)";

        $conexao = DB::conexao();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':fk_id_grupo', $this->fk_id_grupo);
        $stmt->bindParam(':fk_id_modulo', $this->fk_id_modulo);
        $stmt->bindParam(':fk_id_permissao', $this->fk_id_permisao);
        $stmt->execute();
        return $conexao->lastInsertId();
    }

    public static function listar()
    {
        $sql = "SELECT * FROM tabela_modulos";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();
        if ($registros) {
            foreach ($registros as $objeto) {
                $temporario = new Modulo();
                $temporario->setid($objeto['$id_modulo']);
                $temporario->setDescricao($objeto['descricao']);
                $temporario->setDiretorio($objeto['diretorio']);
                $itens[] = $temporario;
            }
            return $itens;
        }
        return false;
        foreach ($modulos as $modulo) {
            $permissao = Permissao::listar();
            if ($permissao) {
                foreach ($permissoes as $permissao) {
                }
            }
        }
    }

    public static function listar()
    {
        $sql = "SELECT * FROM tabela_permissao";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();
        if ($registros) {
            $itens = array();
            foreach ($registros as $objeto) {
                $temporario = new Permissao();
                $temporario->setid($objeto['$id_permisao']);
                $temporario->setDescricao($objeto['descricao']);
                $temporario->setAcao($objeto['acao']);
                $itens[] = $temporario;
            }
            return $itens;
        }
        return false;

    }

}