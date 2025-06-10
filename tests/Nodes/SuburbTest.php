<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\Suburb;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class SuburbTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    public function nodeName(): string
    {
        return 'suburb';
    }

    protected function nodeClass(): string
    {
        return Suburb::class;
    }

    public function test_display_is_null_when_no_attribute_is_present()
    {
        $xml = simplexml_load_string("<suburb>Suburb</suburb>");

        $node = new Suburb($xml);

        $this->assertNull($node->display);
    }

    public function test_display_is_yes_when_attribute_is_yes()
    {
        $xml = simplexml_load_string("<suburb display='yes'>Suburb</suburb>");

        $node = new Suburb($xml);

        $this->assertEquals(YesNoEnum::YES->value, $node->display->value);
    }

    public function test_display_is_no_when_attribute_is_no()
    {
        $xml = simplexml_load_string("<suburb display='no'>Suburb</suburb>");

        $node = new Suburb($xml);

        $this->assertEquals(YesNoEnum::NO->value, $node->display->value);
    }

    public function test_display_property_is_instance_of_yes_no_enum()
    {
        $xml = simplexml_load_string("<suburb display='no'>Suburb</suburb>");

        $node = new Suburb($xml);

        $this->assertInstanceOf(YesNoEnum::class, $node->display);
    }
}
