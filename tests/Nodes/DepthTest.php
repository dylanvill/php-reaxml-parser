<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Depth;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class DepthTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Depth::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Depth::class;
    }

    public function test_unit_is_null_when_there_is_no_unit_attribute(): void
    {
        $xml = $this->generateXml(Depth::NODE_NAME);
        $depth = new Depth($xml);

        $this->assertNull($depth->unit);
    }

    public function test_unit_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Depth::NODE_NAME, ["unit" => "meter"]);
        $depth = new Depth($xml);

        $this->assertEquals("meter", $depth->unit);
    }

    public function test_side_is_null_when_there_is_no_side_attribute(): void
    {
        $xml = $this->generateXml(Depth::NODE_NAME);
        $depth = new Depth($xml);

        $this->assertNull($depth->side);
    }

    public function test_side_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Depth::NODE_NAME, ["side" => "rear"]);
        $depth = new Depth($xml);

        $this->assertEquals("rear", $depth->side);
    }
}
