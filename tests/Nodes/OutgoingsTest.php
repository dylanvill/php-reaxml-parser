<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Outgoings;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class OutgoingsTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Outgoings::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Outgoings::class;
    }

    public function test_period_is_null_when_there_is_no_period_attribute(): void
    {
        $xml = $this->generateXml(Outgoings::NODE_NAME);
        $outgoings = new Outgoings($xml);

        $this->assertNull($outgoings->period);
    }

    public function test_period_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Outgoings::NODE_NAME, ["period" => "annual"]);
        $outgoings = new Outgoings($xml);

        $this->assertEquals("annual", $outgoings->period);
    }
}
