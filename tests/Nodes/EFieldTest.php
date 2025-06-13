<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\EField;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class EFieldTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return EField::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return EField::class;
    }

    public function test_name_is_null_when_name_attribute_is_null(): void
    {
        $xml = $this->generateXml(EField::NODE_NAME);
        $eField = new EField($xml);

        $this->assertNull($eField->name);
    }

    public function test_name_has_the_correct_value(): void
    {
        $xml = $this->generateXml(EField::NODE_NAME, ["name" => "name-test"]);
        $eField = new EField($xml);

        $this->assertEquals("name-test", $eField->name);
    }
}
