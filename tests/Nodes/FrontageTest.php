<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\Frontage;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class FrontageTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Frontage::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Frontage::class;
    }

    public function test_unit_is_null_when_there_is_no_unit_attribute(): void
    {
        $xml = $this->generateXml(Frontage::NODE_NAME);
        $frontage = new Frontage($xml);

        $this->assertNull($frontage->unit);
    }

    public function test_unit_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Frontage::NODE_NAME, ["unit" => "meter"]);
        $frontage = new Frontage($xml);

        $this->assertEquals("meter", $frontage->unit);
    }
}
