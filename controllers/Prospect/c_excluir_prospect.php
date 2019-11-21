<?php
session_start();

require_once('ControllerProspect.php');
require_once('../../models/Prospect.php');

use models\Prospect;
use controllers\ControllerProspect;

if(isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
   
    $prospect = new Prospect(); 
    $prospect->addProspect($codigo, '', '', '', '', '');

    $ctrlProspect = new ControllerProspect;
    $ctrlProspect->excluirProspect($prospect);

    unset($prospect);
    unset($ctrlProspect);

    header("Location: ../../views/Prospects/v_listar_prospects.php");
}else{
    $_SESSION['erroLogin'] = "Faça o login para completar a operaçao";
    header("Location: ../index.php");
}

?>