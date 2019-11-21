<?php
session_start();

$separador = DIRECTORY_SEPARATOR;
$diretorioBaSE = dirname(__FILE__).$separador;

$separador = DIRECTORY_SEPARATOR;
$root = $_SERVER['DOCUMENT_ROOT'].$separador;

require_once('ControllerProspect.php');
require_once($root.'prospectcoletor/models/Prospect.php');

use models\Prospect;
use controllers\ControllerProspect;

if(isset($_POST['email'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $facebook = $_POST['facebook'];
    $whatsaap = $_POST['whatsaap'];

    $prospect = new Prospect();
    $prospect->addProspect(null, $nome, $email, $celular, $facebook, $whatsaap);

     $ctrlProspect = new ControllerProspect();

    try{
        $ctrlProspect->salvarProspect($prospect);
      
        unset($prospect);
        unset($ctrlProspect);
        header('Location: ../../views/Prospect/v_listar_prospects.php');

    }catch(\Exception $e){
        $_SESSION['erroAlteracao'] = $e->getMessage();
        
        header('Location: ../../views/Prospect/v_alterar_prospect.php');
    }

}else{
    $_SESSION['erroLogin'] = "Faça seu login para completar a operaçao";
    header("Location: ../../index.php");


}
?>