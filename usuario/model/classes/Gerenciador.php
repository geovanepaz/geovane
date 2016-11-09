<?php


class Gerenciador
{

    static function adicionar(Usuario $usuario, $confSenha){
        $dao = new DAOUsuario();

        //se retornar verdadeiro algum dado esta errado então retorna
        $retorno = ValidaUsuario::cadastro($usuario,$confSenha);
        if ($retorno)
            return $retorno;

        //codifica a senha
        $cod = ValidaUsuario::codificaSenha($usuario->getSenha());
        $usuario->setSenha($cod);

        //verifica se o suario ja se encontra na base de dados
        if ($dao->getEmail($usuario))
            return "Usuario ja cadastrado";

        if($dao->adicionar($usuario))
            return "Usuario cadastrado com sucesso";
        else
            return "Erro ao cadastrar o usuario";

    }

    static function deletar($email){
        $dao = new DAOUsuario();

        //verifica se o o email é valido
        if(!ValidaUsuario::email($email))
            return 'email invalido';

        //verifica se o usuario exixte, caso verdadeiro armazena o objeto retornado
        $retorno = $dao->getEmail($email);
        if(!$retorno)
            return 'Usuario não encontrado';

            //exclui o usuario
            $dao->deletar($retorno->id);
            return "Usuario deletado com sucesso";

    }

    static function buscar($email){
        $dao = new DAOUsuario();

        //verifica se o o email é valido
        if(!ValidaUsuario::email($email))
            return 'email invalido';

        return $dao->getEmail($email);

    }

    static function editar(Usuario $usuario){
        $dao = new DAOUsuario();

        //verifica se o o email é valido
        if(!ValidaUsuario::email($usuario->getEmail()))
            return 'email invalido';

        //verifica se o usuario exixte
        if(!$dao->getEmail($usuario->getEmail()))
            return 'Usuario não encontrado';

        if($dao->editar($usuario));
            return 'usuario alterado com sucesso';




    }



}