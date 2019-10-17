<?php
namespace CONTROLLERS;
require_once('../../DAO/DAOUsuario.php');
use DAO\DAOUsuario;

/**
 * Esta classe é responsavel por fazer o tratamento dos dados para a apresentaçao e/ou
 * envio para o DAO
 * Seu espaco limita se as funcoes da entidade Usuario
 * 
 * @author Ronei/Vitor
 */
class ControllerUsuario{
    /**
     * Recebe os dados de login, faz o devido tratamento e envia para o DAO executar 
     * no banco de dados
     * @param string $login Login do usuario
     * @param string $senha Senha do usuario
     * @return Usuario
     */
    public function fazerLogin($login, $senha){
        $daoUsuario = new DAOUsuario();

        $usuario= $daoUsuario->logar($login, $senha);

        unset($daoUsuario);
        return $usuario;
    }
    public function salvarUsuario($nome, $email, $login, $senha){
        $daoUsuario = new DAOUsuario();
        /**
         * Captura a excecao retornada pela DAO no caso de falha ao incluir um usuario
         * e dispara outra excecao para ser tratada por quem chamar esta funcao
         */
        try{
           $retorno = $daoUsuario->incluirUsuario($nome, $email, $login, $senha);
           unset($daoUsuario);
           return $retorno; 
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }


}


?>