<?php
namespace tests;
require_once('../uteis/vendor/autoload.php');
require_once('../models/Prospect.php');
require_once('../controllers/Prospect/ControllerProspect.php');
use PHPunit\Framework\TestCase;
use models\Prospect;
use controllers\ControllerProspect;


class ControllerProspectTest extends TestCase{
    /** @test */
    public function testLogar(){
        $ctrlProspect = new ControllerProspect();
        $Prospect = new Prospect();

        $Prospect->addProspect("bisonho", "bisonho", "bisonho@bisonho", "bisonho", TRUE);
    }

    public function testAtualizarProspect(){
        $ctrlProspect = new ControllerProspect();
        $Prospect = new Prospect();

        try{
            $this->assertEquals(
                TRUE,
                $ctrlProspect->salvarProspect('Marcos dias', 'dias@noites.com', 'dias', '145')
            );
        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }

    public function testeExcluirProspect(){
        $ctrlProspect = new ControllerProspect();
        $Prospect = new Prospect();

        try{
            $this->assertEquals(
                TRUE,
                $ctrlProspect->excluirProspect('1')
            );
        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }

    public function testBuscarProspect(){
        $ctrlProspect = new ControllerProspect();
        $Prospect = new Prospect();

        try{
            $this->assertEquals(
                TRUE,
                $ctrlProspect->salvarProspect('bisinho@bisonho')
            );
        }catch(\Exception $e){
            $this->fail($e->getMessage());
        }
    }
}
?>