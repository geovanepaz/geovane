<?php


class DAOUsuario
{

    private $conexao;

    /**
     * DAOUsuario constructor.
     * @param $conexao
     */
    public function __construct()
    {
        $this->conexao = Conexao::getInstance();
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

    public function getEmail($email){

        $sql = "Select id,nome,email,senha FROM usuario WHERE email = :email";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        if($stmt->execute()) {
            if ($stmt->rowCount()){
                $ret =  $stmt->fetch(PDO::FETCH_OBJ);
                return $ret;
            }
        }else{
            $error = $stmt->errorInfo();
            throw new Exception($error[2]);
        }

        return false;

    }


    public function deletar($id){

        $sql = "DELETE FROM USUARIO WHERE id = $id";
        $stmt = $this->conexao->prepare($sql);

        if ($stmt->execute()){
            if ($stmt->rowCount())
                return true;

        }else{
            $error = $stmt->errorInfo();
            throw new Exception($error);
        }

        return false;


    }

    public function editar(Usuario $usuario){
        $id = $usuario->getId();
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        $sql = 'UPDATE usuario SET nome = :nome, email = :email, senha = :senha WHERE id = :id';
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam('email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

        if($stmt->execute()){
            if($stmt->rowCount())
                return true;
        }else{
            $error = $stmt->errorInfo();
            throw new Exception($error[2]);
        }

        return false;


    }


}