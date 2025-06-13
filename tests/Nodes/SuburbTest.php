<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\Suburb;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class SuburbTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Suburb::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Suburb::class;
    }

    public function test_display_is_null_when_no_attribute_is_present()
    {
        $xml = $this->generateXml(Suburb::NODE_NAME);
        $node = new Suburb($xml);

        $this->assertNull($node->display);
    }

    public function test_display_is_yes_when_attribute_is_yes()
    {
        $xml = $this->generateXml(Suburb::NODE_NAME, ["display" => "yes"]);
        $node = new Suburb($xml);

        $this->assertEquals(YesNoEnum::YES->value, $node->display->value);
    }

    public function test_display_is_no_when_attribute_is_no()
    {
        $xml = $this->generateXml(Suburb::NODE_NAME, ["display" => "no"]);
        $node = new Suburb($xml);

        $this->assertEquals(YesNoEnum::NO->value, $node->display->value);
    }

    public function test_display_property_is_instance_of_yes_no_enum()
    {
        $xml = $this->generateXml(Suburb::NODE_NAME, ["display" => "no"]);
        $node = new Suburb($xml);

        $this->assertInstanceOf(YesNoEnum::class, $node->display);
    }
}
