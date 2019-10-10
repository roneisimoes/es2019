<?php
namespace test;

require_once('../vendor/autoload.php');
require_once('../models/Usuario.php');
require_once('../DAO/DAOUsuario.php');

use PHPUnit\Framework\TestCase;
use models\Usuario;
use DAO\DAOUsuario;

class UsuarioTest extends TestCase{
    /** @test */
    public function testLogar(){
       $DAOUsuario = new DAOUsuario();
       $daoUsuario = new DAOUsuario();
       $DAOUsuario->addUsuario("paulo", "paulo", "paulo@eu.com", "", TRUE);
       $this->assertEquals(
          $DAOUsuario,
          $daoUsuario->logar('paulo', '123')
       );
       unset($DAOUsuario);
    }
    /** @test */
    public function testIncluirUsuario(){
       $daoUsuario = new DAOUsuario();
       $this->assertEquals(
          TRUE,
          $daoUsuario->incluirUsuario("raul", "raul@gmail.com", "raul", "raul")
       );
       unset($DAOUsuario);
    }
 }
?>