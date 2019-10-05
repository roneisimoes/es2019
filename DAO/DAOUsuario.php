<?php
    namespace DAO;
    
    require_once('../models/Usuario.php');
    use MODELS\Usuario;
    class DAOUsuario {
        public function logar($login, $senha) {
            $retorno = new Usuario();
            $conexao = $this->conectarBanco();
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
        public function incluirUsuario($login, $senha, $nome, $email) {
            $conexao = $this->conectarBanco();
            $sql = $conexao->prepare("INSERT INTO usuario (login, senha, nome, email) 
                                    VALUES(?, ?, ?, ?)");
            $sql->bind_param("ssss", $login, $senha, $nome, $email);
            $sql->execute();
            if (!$sql->error)
                return true;
            else
                return false;
        }
        private function conectarBanco() {
            $conn = new \mysqli("localhost", "root", "", "mydb");
            return $conn;
        }
        
    }
?> 