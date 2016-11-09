<?php


class ValidaUsuario
{
    static function cadastro(Usuario $usuario, $confSenha){
        if(!self::nome($usuario->getNome()))
            return 'Nome muito curto';

        if (!self::email($usuario->getEmail()))
            return 'Email invalido';

        if(!self::tamanhoSenha($usuario->getSenha()))
            return 'senha muito curta';

        if (!self::confirmaSenha($usuario->getSenha(),$confSenha))
            return 'As senhas não conferem';

        return false;
    }

    static function  email($email){
        //valida email
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
            return true;

        return false;
    }

    static function nome($nome){
        //verica se o nome tem mais de 3 caracteres
        if(strlen(trim($nome))>3)
            return true;

        return false;
    }

    static function tamanhoSenha($senha){

        //verica se a senha tem mais de 3 caracteres
        if(strlen(trim($senha))>3)
            return true;

        return false;
    }

    static function confirmaSenha($senha, $confrima){
        //verica se as senhas saõ iquais
        if($senha == $confrima)
            return true;

        return false;
    }

    static function codificaSenha($senha){
        $codificada = password_hash($senha, PASSWORD_DEFAULT,[
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ]);

        return $codificada;

    }

}