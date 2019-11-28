<?php
    namespace DAO;
    $separador = DIRECTORY_SEPARATOR;
    $root = $_SERVER['DOCUMENT_ROOT'].$separador;
    require_once($root .'RVProspect/models/Usuario.php');
    
    use MODELS\Prospect;
    class DAOProspect{
       
    public function incluirProspect($nome, $email, $celular, $facebook, $whatsapp){
        $conexaoDB = $this-> conectarbanco();
        
        $sqlInsert = $conexaoDB->prepare("insert into prospect
                                        (nome, email, celular, facebook, whatsapp)
                                        values
                                        (?, ?, ?, ?, ?)");
        $sqlInsert ->bind_param("sssss", $nome, $email, $celular, $facebook, $whatsapp);
        
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

   

    public function atualizarProspect($nome, $email, $celular, $facebook, $whatsapp){
        $conexaoDB = $this-> conectarbanco();
        
        $sqlUpdate = $conexaoDB->prepare("UPDATE prospect
                                        SET nome=? , email=?, celular=?, facebook=?, whatsapp=?
                                        WHERE idprospect =?");
        $sqlUpdate ->bind_param("ssssssi", $nome, $email, $celular, $facebook, $whatsapp);
        
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

    public function buscarProspects($email=null){
        $conexaoDB = $this-> conectarbanco();
        $prospects = array();
        
        if($email == null){
                    
            $sqlBusca = $conexaoDB->prepare("select idprospect, nome, email, celular, facebook, whatsapp from prospect");
            $sqlBusca->execute();
        }else{
            $sqlBusca = $conexaoDB->prepare("select idprospect, nome, email, celular, facebook, whatsapp from prospect where email = ?");
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