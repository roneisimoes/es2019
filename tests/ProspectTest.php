<?php
namespace test;

require_once('../vendor/autoload.php');
require_once('../models/Prospect.php');

use models\Prospect;
use PHPUnit\Framework\TestCase;

class ProspectTest extends TestCase{
    /** @teste */
    public function testIncluirProspect(){
        $Prospect = new Prospect();

        $this->assertEquals(
            TRUE,
            $Prospect->incluirProspect('ronei', 'ronei@bisonho', '12245678', 'reinei', '12245678', 'fodase', '42', 'tantofaz', 'cacador', 'SC', '89500000')
        );
        unset($Prospect);
    }
     
   /** @teste **/
    public function testAtualizarProspect(){
        $Prospect = new Prospect();

        $this->assertEquals(
            TRUE,
            $Prospect->atualizarProspect('jao', 'jao@bisonho', '12345678', 'jaozin', '12345678', 'doscorno', '50', 'centro', 'cacador', 'SC', '89512000', '0')
        );
        unset($Prospect);

    }

     
    /** @teste **/
    public function testExcluirProspect(){
        $Prospect = new Prospect();

        $this->assertEquals(
            TRUE,
            $Prospect->excluirProspect('0')
        );
        unset($Prospect);

    }
}
?>