<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\CommercialListingType;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class CommercialListingTypeTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return CommercialListingType::class;
    }

    public function test_value_is_null_when_no_value_attribute_is_present(): void
    {
        $xml = $this->generateXml(CommercialListingType::NODE_NAME);
        $category = new CommercialListingType($xml);

        $this->assertNull($category->value);
    }

    public function test_value_has_the_correct_value(): void
    {
        $xml = $this->generateXml(CommercialListingType::NODE_NAME, ["value" => "sale"]);
        $category = new CommercialListingType($xml);

        $this->assertEquals("sale", $category->value);
    }
}
