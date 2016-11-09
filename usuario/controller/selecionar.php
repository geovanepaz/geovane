<?php
require_once '../model/classes/Usuario.php';
require_once '../model/DAO/DAOUsuario.php';
require_once '../model/classes/Conexao.php';
require_once '../model/classes/Gerenciador.php';
require_once '../model/classes/ValidaUsuario.php';



try {
    $email = 'jonas@gmail.com';//$_POST['email'];

    $retorno = Gerenciador::buscar($email);
    if ($retorno)
        var_dump($retorno);
    else
        echo "Usuario não encontrado";

}catch (Exception $e){
    die ($e->getMessage());

}

