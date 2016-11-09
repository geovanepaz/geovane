<?php
require_once '../model/classes/Usuario.php';
require_once '../model/DAO/DAOUsuario.php';
require_once '../model/classes/Conexao.php';
require_once '../model/classes/Gerenciador.php';
require_once '../model/classes/ValidaUsuario.php';
$email = 'jonas@gmail.com';//$_POST['email'];

try {

    $usuario = new Usuario();
    $usuario->setEmail($email);
    $usuario->setNome('Vaiii');
    $usuario->setSenha('aaaa');

    echo Gerenciador::editar($usuario);

}catch (Exception $e){
    die ($e->getMessage());

}


