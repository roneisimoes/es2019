<?php
    namespace DAO;
    mysqli_report(MYSQLI_REPORT_STRICT);
    
    require_once('../models/Usuario.php');
    use MODELS\Usuario;
    /**
     * Esta classe é responsavel por fazer a comunicaçao com o banco de dados,
     * provendo as funçoes de logar e incluir um novo usuario
     * @author Ronei/Vitor
     * @package DAO 
     */
    class DAOUsuario {
        /**
         * Faz o login do usuario no sistema e retorna um objeto usuario
         * @param string $login Login do usuario
         * @param string $senha Senha do usuario
         * @return Usuario Se logado com sucesso os atributos serao retornado com os dados do usuario, senao retornarao
         * com valor nulo, exceto o atributo $logado, que retornara FALSE
         */
        public function logar($login, $senha) {
            try{
                $conexaoDB = $this->conectarBanco();
            }catch(\Exception $e){
                die($e->getMessage());
            }
            $usuario = new Usuario();

            $sql = $conexao->prepare("SELECT login, nome, email, celular
                                    FROM usuario
                                    WHERE login=? AND senha=?");
            $sql->bind_param("ss", $login, $senha);
            $sql->execute();
            
            $retorno = new Usuario();
            $resultado = $sql->get_result();
            if ($resultado->num_rows === 0)
                $retorno->addUsuario(null, null, null, null, false);
            else {
                $this->logado = true;
                while($linha = $resultado->fetch_assoc())
                    $retorno->addUsuario($linha["login"], $linha["nome"], $linha["email"], $linha["celular"], true);
                
            }
            $sql->close();
            $conexao->close();
            return $retorno;
        }
        /**
         * Inclui um novo usuario no sistema
         * @param string $nome Nome do usuario
         * @param string $email Email do usuario
         * @param string $login Login do usuario
         * @param string $senha Senha do usuario
         * @return TRUE|Exception TRUE para inclusao bem sucedida ou Exception para inclusao mal sucedida
         */
        public function incluirUsuario($nome, $email, $login, $senha){
            try{
            $conexao = $this->conectarBanco();
            }catch(\Exception $e){
                die($e->getMessage());
            }

            $sqlInsert = $conexaoDB->prepare("insert into usuario
                                       (nome, email, login, senha)
                                       values
                                       (?, ?, ?, ?)");
            $sqlInsert->bind_param("ssss", $nome, $email, $login, $senha);
            $sqlInsert->execute();
                if(!$sqlInsert->error){
                 $retorno =  TRUE;
                }else{
                    throw new Exception("Nao foi possivel incluir novo usuario");
                    die;
                }
                  $conexaoDB->close();
                   $sqlInsert->close();
                return $retorno;
        }
        /**
         * Efetua a conexao com o banco de dados usando mysqli
         * @return mysqli|Exception 
         */


        private function conectarBanco() {
            if(!defined('DS')){
            define('DS', DIRECTORY_SEPARATOR);
            }
            IF(!defined('BASE_DIR')){
            define('BASE_DIRECTORY', dirname(__FILE__).DS);
            }
            require(BASE_DIR.'config.php');
            try{
                $conn = new \mysqli($dbhost, $user, $password, $banco);
                return $conn;
            }catch(mysqli_sql_exception $e){
                throw new \Exception($e);
                die;
            }
        }
        
    }
?> 