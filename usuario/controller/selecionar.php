<?php
require_once '../model/classes/Usuario.php';
require_once '../model/DAO/DAOUsuario.php';
require_once '../model/classes/Conexao.php';

$usuaio = new Usuario();
$usuaio->setEmail('email');
$dao = new DAOUsuario();
$ret = $dao->getEmail($usuaio);

if ($ret)
    var_dump($ret);
else
    echo "Usuario não encontrado";
