<?php
namespace MODELS;
/**
 * Classe Model de usuário
 * @author Ronei/Vitor
 * @package MODELS
 */
class Prospect{
/**
 * Identifica Prospect
 * @var int
 */
   public $idprospect;
   /**
 * Nome do Prospect
 * @var string
 */
   public $nome;
   /**
 * EMAIL do Prospect
 * @var string
 */
   public $email;
   /**
 * Celular do Prospect
 * @var string
 */
   public $celular;
   /**
 * Facebookndo Prospect
 * @var string
 */
   public $facebook;
   /**
 * Whatsapp do Prospect
 * @var string
 */
   public $whatsapp;
   /**
 * Rua do endereco do Prospect
 * @var string
 */
   public $rua;
   /**
 * Numero do endereco do Prospect
 * @var int
 */
   public $numero;
/**
 * Bairro do endereco do Prospect
 * @var string
 */
   public $bairro;
/**
 * Cidade do Prospect
 * @var string
 */
   public $cidade;
/**
 * Uf do Prospect
 * @var string
 */
   public $uf;
/**
 * Cep do Prospect
 * @var string
 */
   public $cep;
/**
 * Carrega os atributos da classe
 * @param int $idprospect Identificador do Prospect
 * @param string $nome Nome do Prospect
 * @param string $email Email do Prospect
 * @param string $celular Celular do Prospect
 * @param string $facebook Facebook do Prospect
 * @param string $whatsapp Whatsapp do Prospect
 * @param string $rua Endereco do Prospect
 * @param string $numero Numero do endereco do Prospect
 * @param string $bairro Bairro do Prospect
 * @param string $cidade Cidade do Prospect
 * @param string $uf UF do Prospect
 * @param string $cep CEP do Prospect
 * @return void
 */
   public function addProspect($nome, $email, $celular, $facebook, $whatsapp, $rua, $numero, $bairro, $cidade, $uf, $cep){
        $this->idprospect = $idprospect;
        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
        $this->facebook = $facebook;
        $this->whatsapp = $whatsapp;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->cep = $cep;
   }
}
?>