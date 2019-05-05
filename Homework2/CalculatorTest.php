<?php

use \PHPUnit\Framework\TestCase;
use \App\Calculator;

class CalculatorTest extends TestCase
{

    protected $calc;

    public function setUp():void
    {
        $this->calc = new Calculator;
    }

    /** @test */
    public function ResultAndTypeOfAdd()
    {
        $this->assertEquals(2, $this->calc->add(1,1));
        $this->assertEqualsWithDelta(3.61, $this->calc->add(1.25,2.36),0.1);
        $this->assertEqualsWithDelta(1.11, $this->calc->add(-1.25,2.36), 0.001);
        $this->assertIsFloat($this->calc->add(1.25,2.36));
    }

    /** @test */
    public function DivideException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calc->divide(2, 0);
    }

}