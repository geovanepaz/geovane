<?php
require_once '../model/classes/Usuario.php';
require_once '../model/DAO/DAOUsuario.php';
require_once '../model/classes/Conexao.php';
require_once '../model/classes/Gerenciador.php';
require_once '../model/classes/ValidaUsuario.php';
$nome = 'vixii';//$_POST['nome'];
$email = 'amor1j01@gmail.com';//$_POST['email'];
$senha = '22222';//$_POST['senha'];
$confSenha ='22222'; //$_POST['confSenha'];

try {
    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setSenha($senha);
    $usuario->setEmail($email);

    $res = Gerenciador::adicionar($usuario,$confSenha);

   echo $res;


}catch (Exception $e){
    die ($e->getMessage());

}