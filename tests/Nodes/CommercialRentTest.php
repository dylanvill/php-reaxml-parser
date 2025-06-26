<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\TaxEnum;
use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\CommercialRent;
use AdGroup\ReaxmlParser\Nodes\RentPerSquareMetre;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class CommercialRentTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return CommercialRent::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return CommercialRent::class;
    }

    public function test_rent_per_square_metre_is_null_when_element_is_not_present(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME);
        $commercialRent = new CommercialRent($xml);

        $this->assertNull($commercialRent->rentPerSquareMetre);
    }

    public function test_rent_per_square_metre_is_not_null_when_element_is_present(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME, [], [
            [
                "name" => RentPerSquareMetre::NODE_NAME,
                "attributes" => [],
                "value" => ""
            ]
        ]);
        $commercialRent = new CommercialRent($xml);

        $this->assertInstanceOf(RentPerSquareMetre::class, $commercialRent->rentPerSquareMetre);
    }

    public function test_period_is_null_when_element_does_not_have_the_period_attribute(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME);
        $commercialRent = new CommercialRent($xml);

        $this->assertNull($commercialRent->period);
    }

    public function test_period_has_the_correct_value(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME, ["period" => "period-test"]);
        $commercialRent = new CommercialRent($xml);

        $this->assertEquals("period-test", $commercialRent->period);
    }

    public function test_plus_outgoings_is_null_when_element_does_not_have_the_plus_outgoings_attribute(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME);
        $commercialRent = new CommercialRent($xml);

        $this->assertNull($commercialRent->plusOutgoings);
    }

    public function test_plus_outgoings_is_yes_when_the_attribute_value_is_yes(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME, ["plusOutgoings" => "yes"]);
        $commercialRent = new CommercialRent($xml);

        $this->assertEquals(YesNoEnum::YES, $commercialRent->plusOutgoings);
    }

    public function test_plus_outgoings_is_no_when_the_attribute_value_is_no(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME, ["plusOutgoings" => "no"]);
        $commercialRent = new CommercialRent($xml);

        $this->assertEquals(YesNoEnum::NO, $commercialRent->plusOutgoings);
    }

    public function test_tax_is_null_when_element_does_not_have_the_tax_attribute(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME);
        $commercialRent = new CommercialRent($xml);

        $this->assertNull($commercialRent->tax);
    }

    public function test_tax_has_the_correct_unknown_enum_value(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME, ["tax" => "unknown"]);
        $commercialRent = new CommercialRent($xml);

        $this->assertEquals(TaxEnum::UNKNOWN, $commercialRent->tax);
    }

    public function test_tax_has_the_correct_exempt_enum_value(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME, ["tax" => "exempt"]);
        $commercialRent = new CommercialRent($xml);

        $this->assertEquals(TaxEnum::EXEMPT, $commercialRent->tax);
    }

    public function test_tax_has_the_correct_inclusive_enum_value(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME, ["tax" => "inclusive"]);
        $commercialRent = new CommercialRent($xml);

        $this->assertEquals(TaxEnum::INCLUSIVE, $commercialRent->tax);
    }

    public function test_tax_has_the_correct_exclusive_enum_value(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME, ["tax" => "exclusive"]);
        $commercialRent = new CommercialRent($xml);

        $this->assertEquals(TaxEnum::EXCLUSIVE, $commercialRent->tax);
    }

    public function test_tax_is_null_when_it_doesnt_match_any_enum(): void
    {
        $xml = $this->generateXml(CommercialRent::NODE_NAME, ["tax" => "unknown-value"]);
        $commercialRent = new CommercialRent($xml);

        $this->assertNull($commercialRent->tax);
    }
}
