<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\TaxEnum;
use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\Price;
use AdGroup\ReaxmlParser\Nodes\Range;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class PriceTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return Price::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Price::class;
    }

    public function test_range_is_instantiated_when_range_element_is_present(): void
    {
        $xml = $this->generateXml(Price::NODE_NAME, [], [
            [
                "name" => Range::NODE_NAME,
                "attributes" => [],
                "value" => "range-test"
            ]
        ]);
        $price = new Price($xml);

        $this->assertInstanceOf(Range::class, $price->range);
    }

    public function test_display_is_null_when_there_is_no_display_attribute(): void
    {
        $xml = $this->generateXml(Price::NODE_NAME);
        $price = new Price($xml);

        $this->assertNull($price->display);
    }

    public function test_display_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Price::NODE_NAME, ["display" => "yes"]);
        $price = new Price($xml);

        $this->assertEquals(YesNoEnum::YES, $price->display);
    }

    public function test_tax_is_null_when_there_is_no_tax_attribute(): void
    {
        $xml = $this->generateXml(Price::NODE_NAME);
        $price = new Price($xml);

        $this->assertNull($price->tax);
    }

    public function test_tax_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Price::NODE_NAME, ["tax" => "unknown"]);
        $price = new Price($xml);

        $this->assertEquals(TaxEnum::UNKNOWN, $price->tax);
    }
}
