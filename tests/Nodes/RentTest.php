<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\Rent;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class RentTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Rent::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Rent::class;
    }

    public function test_period_is_null_when_there_is_no_period_attribute(): void
    {
        $xml = $this->generateXml(Rent::NODE_NAME);
        $rent = new Rent($xml);

        $this->assertNull($rent->period);
    }

    public function test_period_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Rent::NODE_NAME, ["period" => "week"]);
        $rent = new Rent($xml);

        $this->assertEquals("week", $rent->period);
    }

    public function test_display_is_null_when_there_is_no_display_attribute(): void
    {
        $xml = $this->generateXml(Rent::NODE_NAME);
        $rent = new Rent($xml);

        $this->assertNull($rent->display);
    }

    public function test_display_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Rent::NODE_NAME, ["display" => "yes"]);
        $rent = new Rent($xml);

        $this->assertEquals(YesNoEnum::YES, $rent->display);
    }
}
