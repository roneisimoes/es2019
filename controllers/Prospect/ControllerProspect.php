<?php
namespace CONTROLLERS;
require_once('../../DAO/DAOProspect.php');
use DAO\DAOProspect;

/**
 * Esta classe é responsavel por fazer o tratamento dos dados para a apresentaçao e/ou
 * envio para o DAO
 * Seu espaco limita se as funcoes da entidade Prospect
 * 
 * @author Ronei/Vitor
 */
class ControllerUsuario{
    /**
     * Recebe os dados, faz o devido tratamento e envia para o DAO executar 
     * no banco de dados
     * @param string $login Login do usuario
     * @param string $senha Senha do usuario
     * @return Usuario
     */
    public function incluirProspect($nome, $email, $celular, $facebook, $whatsapp, $rua, $numero, $bairro, $cidade, $uf, $cep){
        $daoProspect = new DAOProspect();

        $Prospect= $daoProspect->incluir($nome, $email, $celular, $facebook, $whatsapp, $rua, $numero, $bairro, $cidade, $uf, $cep);

        unset($daoProspect);
        return $prospect;
    }

    public function atualizarProspect($nome, $email, $celular, $facebook, $whatsapp, $rua, $numero, $bairro, $cidade, $uf, $cep, $idprospect){
        $daoProspect = new DAOProspect();
        /**
         * Captura a excecao retornada pela DAO no caso de falha ao incluir um usuario
         * e dispara outra excecao para ser tratada por quem chamar esta funcao
         */
        try{
           $retorno = $daoProspect->atualizarProspect($nome, $email, $celular, $facebook, $whatsapp, $rua, $numero, $bairro, $cidade, $uf, $cep, $idprospect);
           unset($daoProspect);
           return $retorno; 
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function excluirProspect($idprospect){
        $daoProspect = new DAOProspect();
        
        try{
            $retorno = $daoProspect->prepare("DELETE FROM prospect WHERE idprospect =?");
            $sqlDelete ->bind_param("i", $idprospect);
            unset($daoProspect);
            return $retorno; 
         }catch(\Exception $e){
             throw new \Exception($e->getMessage());
         }

    }


    public function buscarProspect($email=null){
        $daoProspect = new DAOProspect();
        
        try{
            $retorno = $daoProspect->buscarProspect($nome, $email, $celular, $facebook, $whatsapp, $rua, $numero, $bairro, $cidade, $uf, $cep, $idprospect);
            unset($daoProspect);
            return $retorno; 
         }catch(\Exception $e){
             throw new \Exception($e->getMessage());
         }
        }
        
}


?>