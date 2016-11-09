<?php
require_once '../model/classes/Usuario.php';
require_once '../model/DAO/DAOUsuario.php';
require_once '../model/classes/Conexao.php';
require_once '../model/classes/Gerenciador.php';
require_once '../model/classes/ValidaUsuario.php';
$email = 'geovane@geovane.com';//$_POST['email'];

try {


   $retorno = Gerenciador::deletar($email);
    echo $retorno;

}catch (Exception $e){
    die ($e->getMessage());

}