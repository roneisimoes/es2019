<?php
namespace MODELS;
/**
 * Classe Model de usuário
 * @author Ronei/Vitor
 * @package MODELS
 */
class Usuario{
/**
 * Login do usuário
 * @var string
 */

   public $login;
   /**
 * Nome do usuário
 * @var string
 */
   public $nome;
   /**
 * EMAIL do usuário
 * @var string
 */
   public $email;
   /**
 * Celular do usuário
 * @var string
 */
   public $celular;
   /**
 * Status do usuário no sistema
 * @var string
 */
   public $logado;
   /**
 * Carrega os atributos da classe
 * @param string $login Login do Usuario
 * @param string $nome Nome do Usuario
 * @param string $email Email do Usuario
 * @param string $celular Celular do Usuario
 * @param boolean $logado Status do Usuario no sistema
 * @return void
 */
   public function addUsuario($login, $nome, $email, $celular, $logado){
      $this->login = $login;
      $this->nome = $nome;
      $this->email = $email;
      $this->celular = $celular;
      $this->logado = $logado;
   }
}
?>