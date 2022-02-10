<?php

if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require 'conexao2';
    require "usuario.class.php";

    $u = new usuario();

    $login = addslashes($_POST['login']);
    $login = addslashes($_POST['senha']);

    if($u->login($email, $senha) == true){
        if(isset($_SESSION['login'])){
            header("location: index.php");
        }else{
            header("location: logar.php");
        }
    }else{
        header("location: logar.php");
    }

}else{
    header("location: logar.php");
}

?>