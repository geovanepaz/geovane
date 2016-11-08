<?php
require_once '../model/classes/Usuario.php';
require_once '../model/DAO/DAOUsuario.php';
require_once '../model/classes/Conexao.php';
$nome = 'geovane';
$email = 'email';
$senha = 'senha';

try {

    $conexao = Conexao::getInstance();
    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setSenha($senha);
    $usuario->setEmail($email);

    $dao = new DAOUsuario($conexao);
    $retorno = $dao->adicionar($usuario);
    var_dump($retorno);

}catch (Exception $e){
    die ($e->getMessage());

}