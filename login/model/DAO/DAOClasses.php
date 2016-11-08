<?php

class DAOClasses
{

    private $conexao;

    /**
     * DAOClasses constructor.
     */
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function autenticar(Usuario $usuario){
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        $sql = "SELECT senha FROM usuario WHERE email = :email";

        $stm = $this->conexao->prepare($sql);
        $stm->bindParam(':email',$email,PDO::PARAM_STR);

        if ($stm->execute()){
            $stm->fetchObject();

        }else{
           echo $stm->errorInfo();
        }



    }


}