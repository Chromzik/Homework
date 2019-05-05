<?php

use \PHPUnit\Framework\TestCase;
use \App\DateFormatter;


class DateFormatterTest extends TestCase
{

    protected $date;

    public function setUp():void
    {
        $this->date = new DateFormatter;
    }

    /** @test */
    public function PartOfTheDay()
    {
        for($i = 0; $i < 24; $i++){
            $this->date->setHours($i);
            if ($i >= 0 && $i < 6)
                $this->assertEquals('Night', $this->date->getPartOfDay());
            else if ($i >= 6 && $i < 12)
                $this->assertEquals('Morning', $this->date->getPartOfDay());
            else if ($i >= 12 && $i < 18)
                $this->assertEquals('Afternoon', $this->date->getPartOfDay());
            else
                $this->assertEquals('Evening', $this->date->getPartOfDay());
        }
    }

    public function ReturnValueOfPartOfTheDay()
    {
        $this->assertIsString($this->date->getPartOfDay());
    }

}