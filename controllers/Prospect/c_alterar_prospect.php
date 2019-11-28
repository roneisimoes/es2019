<?php
session_start();
require_once('ControllerProspect.php');
use controllers\ControllerProspect;
if(isset($_POST['idprospect']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['celular'])){
   $idprospect = intval($_POST['idprospect']);
   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $celular = $_POST['celular'];
   $whatsapp = (isset($_POST['whatsapp'])) ? $_POST['whatsapp'] : '';
   $facebook = (isset($_POST['facebook']))? $_POST['facebook'] : '';
   $ctrl = new ControllerProspect();
   
   try {
      $prospect = $ctrl->atualizarProspect($nome, $email, $celular, $facebook, $whatsapp, $idprospect);
      if($prospect == null || $prospect = array()){
         $_SESSION['erroIncluir'] = "Ocorreu um erro ao realizar a atualizacao.";
         header("Location: ../../views/Prospect/v_listar_prospects.php");
      } else { 
         $_SESSION['erroIncluir'] = "Cadastro atualizado com sucesso.";
         header("Location: ../../views/Prospect/v_listar_prospects.php");
      }
   } catch(\Exception $e) {
      $_SESSION['erroIncluir'] = $e->getMessage();
      header("Location: ../../views/Prospect/v_alterar_prospect.php?email=" . $_POST["emailAntigo"]);
  }
   
}else{
   $_SESSION['erroIncluir'] = "Você precisa informar todos os dados para um novo cadastro.";
   header("Location: ../../views/Prospect/v_listar_prospects.php");
}
?>