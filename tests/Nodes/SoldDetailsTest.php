<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\SoldDetails;
use AdGroup\ReaxmlParser\Nodes\Price;
use AdGroup\ReaxmlParser\Nodes\SoldPrice;
use AdGroup\ReaxmlParser\Nodes\Date;
use AdGroup\ReaxmlParser\Nodes\SoldDate;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class SoldDetailsTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return SoldDetails::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return SoldDetails::class;
    }

    public function test_all_elements_are_null_when_nochild_elements_are_present(): void
    {
        $elements = [
            "price",
            "soldPrice",
            "date",
            "soldDate",
        ];

        $xml = $this->generateXml(SoldDetails::NODE_NAME);
        $details = new SoldDetails($xml);

        foreach ($elements as $property) {
            $this->assertNull($details->{$property});
        }
    }

    public function test_all_elements_are_instantiated_properly_when_they_are_present_and_have_a_value(): void
    {
        $map = [
            Price::NODE_NAME => [
                "class" => Price::class,
                "property" => "price"
            ],
            SoldPrice::NODE_NAME => [
                "class" => SoldPrice::class,
                "property" => "soldPrice"
            ],
            Date::NODE_NAME => [
                "class" => Date::class,
                "property" => "date"
            ],
            SoldDate::NODE_NAME => [
                "class" => SoldDate::class,
                "property" => "soldDate"
            ]
        ];

        $xmlNodes = [];
        foreach ($map as $key => $value) {
            $xmlNodes[] = [
                "name" => $key,
                "value" => "test",
                "attributes" => []
            ];
        }

        $xml = $this->generateXml(SoldDetails::NODE_NAME, [], $xmlNodes);
        $details = new SoldDetails($xml);

        foreach ($map as $key => $value) {
            $this->assertInstanceOf($value["class"], $details->{$value["property"]});
        }
    }
}
