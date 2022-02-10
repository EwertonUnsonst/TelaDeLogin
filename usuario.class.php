<?php

class Usuario{
    public function login($login, $senha){
        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("login", $login);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();

            $_SESSION['login'] = $dado['login'];

            return true;
        }else{
            return false;
        }
        
    }
}

?>