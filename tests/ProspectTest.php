<?php
namespace test;

require_once('../vendor/autoload.php');
require_once('../DAO/DAOProspect.php');
require_once('../models/Prospect.php');

use models\Prospect;
use DAO\DAOProspect;
use PHPUnit\Framework\TestCase;

class ProspectTest extends TestCase{
    /** @teste */
    public function testIncluirProspect(){
        $DAOProspect = new DAOProspect();

        $this->assertEquals(
            TRUE,
            $DAOProspect->incluirProspect('ronei', 'ronei@bisonho', '12245678', 'reinei', '12245678', 'fodase', '42', 'tantofaz', 'cacador', 'SC', '89500000')
        );
        unset($DAOProspect);
    }
     
   /** @teste **/
    public function testAtualizarProspect(){
        $DAOProspect = new DAOProspect();

        $this->assertEquals(
            TRUE,
            $DAOProspect->atualizarProspect('jao', 'jao@bisonho', '12345678', 'jaozin', '12345678', 'doscorno', '50', 'centro', 'cacador', 'SC', '89512000', '0')
        );
        unset($DAOProspect);

    }

     
    /** @teste **/
    public function testExcluirProspect(){
        $DAOProspect = new DAOProspect();

        $this->assertEquals(
            TRUE,
            $DAOProspect->excluirProspect('0')
        );
        unset($DAOProspect);

    }
}



// ../uteis/vendor/bin/phpunit --testdocs --colors nomearquivo*

// git add*
// git commit -m 'comentario'
// git push


?>