<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Estate;
use AdGroup\ReaxmlParser\Nodes\Name;
use AdGroup\ReaxmlParser\Nodes\Stage;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class EstateTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Estate::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Estate::class;
    }

    public function test_name_is_null_when_there_is_no_name_element(): void
    {
        $xml = $this->generateXml(Estate::NODE_NAME);
        $estate = new Estate($xml);

        $this->assertNull($estate->name);
    }

    public function test_name_is_not_null_when_name_element_is_present(): void
    {
        $xml = $this->generateXml(Estate::NODE_NAME, [], [
            [
                "name" => Name::NODE_NAME,
                "attributes" => [],
                "value" => ""
            ]
        ]);
        $estate = new Estate($xml);

        $this->assertNull($estate->name);
    }

    public function test_stage_is_null_when_there_is_no_stage_element(): void
    {
        $xml = $this->generateXml(Estate::NODE_NAME);
        $estate = new Estate($xml);

        $this->assertNull($estate->stage);
    }

    public function test_stage_is_not_null_when_stage_element_is_present(): void
    {
        $xml = $this->generateXml(Estate::NODE_NAME, [], [
            [
                "name" => Stage::NODE_NAME,
                "attributes" => [],
                "value" => ""
            ]
        ]);
        $estate = new Estate($xml);

        $this->assertNull($estate->stage);
    }
}
