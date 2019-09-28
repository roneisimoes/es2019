<?php
    namespace models;

    class Prospect{
        public $idprospect;
        public $nome;
        public $email;
        public $celular;
        public $facebook;
        public $whatsapp;
        public $rua;
        public $numero;
        public $bairro;
        public $cidade;
        public $uf;
        public $cep;
    
    public function incluirProspect($nome, $email, $celular, $facebook, $whatsapp, $rua, $numero, $bairro, $cidade, $uf, $cep){
        $conexaoDB = $this-> conectarbanco();
        
        $sqlInsert = $conexaoDB->prepare("insert into prospect
                                        (nome, email, celular, facebook, whatsapp, rua, numero, bairro, cidade, uf, cep)
                                        values
                                        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sqlInsert ->bind_param("ssssssissss", $nome, $email, $celular, $facebook, $whatsapp, $rua, $numero, $bairro, $cidade, $uf, $cep);
        
        $sqlInsert-> execute();
        if(!$sqlInsert->error){
           $retorno = TRUE;
        }else{
           $retorno = FALSE;
        }
        $conexaoDB->close();
        $sqlInsert->close();
    
        return $retorno;
    }

   

    public function atualizarProspect($nome, $email, $celular, $facebook, $whatsapp, $rua, $numero, $bairro, $cidade, $uf, $cep, $idprospect){
        $conexaoDB = $this-> conectarbanco();
        
        $sqlUpdate = $conexaoDB->prepare("UPDATE prospect
                                        SET nome=? , email=?, celular=?, facebook=?, whatsapp=?, rua=?, numero=?, bairro=?, cidade=?, uf=?, cep=?
                                        WHERE idprospect =?");
        $sqlUpdate ->bind_param("ssssssissssi", $nome, $email, $celular, $facebook, $whatsapp, $rua, $numero, $bairro, $cidade, $uf, $cep, $idprospect);
        
        $sqlUpdate-> execute();
        if(!$sqlUpdate->error){
            $retorno = TRUE;
         }else{
            $retorno = FALSE;
         }
         $conexaoDB->close();
         $sqlUpdate->close();
         return $retorno;
    }

    public function excluirProspect($idprospect){
        $conexaoDB = $this-> conectarbanco();
        
        $sqlDelete = $conexaoDB->prepare("DELETE FROM prospect WHERE idprospect =?");
        $sqlDelete ->bind_param("i", $idprospect);
        
        $sqlDelete-> execute();
        if(!$sqlDelete->error){
            $retorno = TRUE;
         }else{
            $retorno = FALSE;
         }
         return $retorno;

    }

    public function buscarProspect($email=null){
        $conexaoDB = $this-> conectarbanco();
        $prospects = array();
        
        if($email == null){
                    
            $sqlBusca = $conexaoDB->prepare("select idprospect, nome, email, celular, facebook, whatsapp, rua, numero, bairro, cidade, uf, cep from prospect");
            $sqlBusca->execute();
        }else{
            $sqlBusca = $conexaoDB->prepare("select idprospect, nome, email, celular, facebook, whatsapp, rua, numero, bairro, cidade, uf, cep from prospect where email = ?");
            $sqlBusca->bind_param("s", $email);
            $sqlBusca->execute();
        }

        $resultado = $sqlBusca->get_result();
        if($resultado->num_rows !== 0){
            while($linha = $resultado->fetch_assoc()){
                $prospect = array(
                    "idprospect" => $linha['idprospect'],
                    "nome" => $linha['nome'],
                    "email" => $linha['email'],
                    "celular" => $linha['celular'],
                    "facebook" => $linha['facebook'],
                    "whatsapp" => $linha['whatsapp'],
                    "rua" => $linha['rua'],
                    "numero" => $linha['numero'],
                    "bairro" => $linha['bairro'],
                    "cidade" => $linha['cidade'],
                    "uf" => $linha['uf'],
                    "cep" => $linha['cep']
                );
                $prospects[] = $prospect;
            }
        }
        
        $conexaoDB->close();
        $sqlBusca->close();       
        return $prospects;
    }

    private function conectarBanco(){
        $conn = new \mysqli('localhost', 'root', '', 'mydb');
        return $conn;
    }
    }
?>