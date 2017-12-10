<?php

namespace Wkhooy;

require_once __DIR__ . '/../src/ObsceneCensorRus.php';

class Cp1251Test extends \PHPUnit_Framework_TestCase  {
    public function testCp1251() {
        $this->assertSame('******', ObsceneCensorRus::getFiltered('������', 'CP1251'));
        $this->assertSame('*****', ObsceneCensorRus::getFiltered('�����', 'CP1251'));

        $this->assertSame('DHIWE ******', ObsceneCensorRus::getFiltered('DHIWE E6AHOE', 'CP1251'));
        $this->assertSame('********', ObsceneCensorRus::getFiltered('��������', 'CP1251'));


        $this->assertTrue(ObsceneCensorRus::isAllowed('������� �����', 'CP1251'));
    }
} 