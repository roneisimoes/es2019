<?php
session_start();
require_once('ControllerUsuario.php');
use controllers\ControllerUsuario;
if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['login']) && isset($_POST['senha'])){
   $nome = $_POST['nome'];
   $usuario = $_POST['usuario'];
   $login = $_POST['login'];
   $senha = $_POST['senha'];
   $ctrlUsuario = new ControllerUsuario();
   try {
      $usuario = $ctrlUsuario->incluirUsuario($login, $senha, $nome, $email);
      if($usuario == null || $usuario = array()){
         header("Location: ../../views/Usuario/v_incluir_usuario.php");
      } else { 
         $_SESSION['erroLogin'] = "Ocorreu um erro ao realizar o cadastro.";
         header("Location: ../../views/Usuario/v_incluir_usuario.php");
      }
   } catch(\Exception $e) {
      $_SESSION['erroLogin'] = "Ocorreu um erro ao realizar o cadastro. " + $e->getMessage();
      header("Location: ../../views/Usuario/v_incluir_usuario.php");
  }
   
}else{
   $_SESSION['erroLogin'] = "Você precisa informar todos os dados para um novo cadastro.";
   header("Location: ../../views/Usuario/v_incluir_usuario.php");
}
?>