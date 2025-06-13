<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Heating;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class HeatingTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Heating::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Heating::class;
    }

    public function test_type_is_null_when_there_is_no_type_attribute(): void
    {
        $xml = $this->generateXml(Heating::NODE_NAME);
        $heating = new Heating($xml);

        $this->assertNull($heating->type);
    }

    public function test_type_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Heating::NODE_NAME, ["type" => "gas"]);
        $heating = new Heating($xml);

        $this->assertEquals("gas", $heating->type);
    }
}
