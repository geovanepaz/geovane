<?php



class DAOUsuario
{

    private $conexao;

    /**
     * DAOUsuario constructor.
     * @param $conexao
     */
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function adicionar(Usuario $usuario){
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        $sql = "INSERT INTO usuario(nome,email,senha) VALUES (:nome, :email, :senha)";
        $stm = $this->conexao->prepare($sql);

        $stm->bindParam(':nome',$nome,PDO::PARAM_STR);
        $stm->bindParam(':email',$email,PDO::PARAM_STR);
        $stm->bindParam(':senha',$senha,PDO::PARAM_STR);

        if($stm->execute()){
            if($stm->rowCount())
                return true;
        }else {
            $error = $stm->errorInfo();
            throw new Exception( $error[2]);
        }
        return false;

    }


}