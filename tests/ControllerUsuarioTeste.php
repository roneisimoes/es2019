<?php
namespace tests;
require_once('../uteis/vendor/autoload.php');
require_once('../models/Usuario.php');
require_once('../controllers/Usuario/ControllerUsuario.php');
use PHPunit\Framework\TestCase;
use models\Usuario;
use controllers\ControllerUsuario;


class ControllerUsuarioTest extends TestCase{
    /** @test */
    public function testLogar(){
        $ctrlUsuario = new ControllerUsuario();
        $usuario = new Usuario();

        $usuario->addUsuario("bisonho", "bisonho", "bisonho@bisonho", "bisonho", TRUE);

        $this->assertEquals(
            $usuario,
            $ctrlUsuario->fazerLogin('bisonho', 'bisonho')

        );
    }
    public function testIncluirUsuario(){
        $ctrlUsuario = new ControllerUsuario();
        $usuario = new Usuario();

        try{
            $this->assertEquals(
                TRUE,
                $ctrlUsuario->salvarUsuario('Marcos dias', 'dias@noites.com', 'dias', '145')
            );
        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }
}
?>