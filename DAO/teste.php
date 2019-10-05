<?php
require_once('DAOUsuario.php');
use DAO\DAOUsuario;
$daoUsuario = new DAOUsuario();
//print_r($daoUsuario->logar("RONEITESTE","1234"));
try{
$daoUsuario->incluirUsuario("roneiteste","ronei@ifsc", "ronei", "1234");
}catch(\Exception $e){
    die($e->getMessage());
}
?>