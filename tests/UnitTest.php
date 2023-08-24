<?php

namespace App\Tests\ebsites\ClicRepare\clicrepare\tests;

use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    public function testdemo()
    {
        $demo = new Demo();
        $demo->setDemo('Demo');

        $this->assertTrue($demo->getDemo() === 'demo');
        return 'Ca fonctionne';
    }
}
