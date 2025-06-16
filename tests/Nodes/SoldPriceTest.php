<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\SoldPrice;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class SoldPriceTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return SoldPrice::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return SoldPrice::class;
    }

    public function test_display_is_null_when_there_is_no_display_attribute(): void
    {
        $xml = $this->generateXml(SoldPrice::NODE_NAME);
        $soldPrice = new SoldPrice($xml);

        $this->assertNull($soldPrice->display);
    }

    public function test_display_has_the_correct_value(): void
    {
        $xml = $this->generateXml(SoldPrice::NODE_NAME, ["display" => "yes"]);
        $soldPrice = new SoldPrice($xml);

        $this->assertEquals("yes", $soldPrice->display);
    }
}
