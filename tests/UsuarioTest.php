<?php
namespace test;

require_once('../vendor/autoload.php');
require_once('../models/Usuario.php');

use models\Usuario;
use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase{
    /** @teste */
    public function testLogar(){
        $usuario = new Usuario();

        $this->assertEquals(
            TRUE,
            $usuario->logar('', '')
        );
        unset($usuario);
    }
     /** @teste */
    public function testIncluirUsuario(){
        $usuario = new Usuario();
        $this->assertEquals(
            TRUE,
            $usuario->incluirUsuario('bisonho','bisonho@bisonho','bisonho','bisonho')
        );
        unset($usuario);
    }



}
?>