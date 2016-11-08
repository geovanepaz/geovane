<?php
require_once '../model/classes/Usuario.php';
require_once '../model/DAO/DAOUsuario.php';
require_once '../model/classes/Conexao.php';

$usuario = new Usuario();
$usuario->setEmail('emaill');

$dao = new DAOUsuario();
$retorno = $dao->getEmail($usuario);

if($retorno){
    $res = $dao->deletar($retorno->id);
    if ($res)
        echo "usuario deletado com sucesso";
    else
        echo "Não foi possivel deletar o usuario";

}else{
    echo "Usuario não encontrado";
}