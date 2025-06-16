<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\ReturnNode;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class ReturnNodeTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return ReturnNode::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return ReturnNode::class;
    }

    public function test_period_is_null_when_there_is_no_period_attribute(): void
    {
        $xml = $this->generateXml(ReturnNode::NODE_NAME);
        $rent = new ReturnNode($xml);

        $this->assertNull($rent->period);
    }

    public function test_period_has_the_correct_value(): void
    {
        $xml = $this->generateXml(ReturnNode::NODE_NAME, ["period" => "annual"]);
        $rent = new ReturnNode($xml);

        $this->assertEquals("annual", $rent->period);
    }

    public function test_unit_is_null_when_there_is_no_unit_attribute(): void
    {
        $xml = $this->generateXml(ReturnNode::NODE_NAME);
        $rent = new ReturnNode($xml);

        $this->assertNull($rent->unit);
    }

    public function test_display_has_the_correct_value(): void
    {
        $xml = $this->generateXml(ReturnNode::NODE_NAME, ["unit" => "percent"]);
        $rent = new ReturnNode($xml);

        $this->assertEquals("percent", $rent->unit);
    }
}
