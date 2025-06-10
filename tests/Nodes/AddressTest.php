<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\Address;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use Orchestra\Testbench\PHPUnit\TestCase;

class AddressTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    private Address $defaultTestAddress;

    const SUB_NUMBER = "2";
    const STREET_NUMBER = "39";
    const STREET = "Main Road";
    const SUBURB = "Richmond";
    const STATE = "vic";
    const POSTCODE = "3121";
    const COUNTRY = "AUS";
    const SITE = "test site";
    const LOT_NUMBER = "test lot number";
    const REGION = "test region";

    private const DEFAULT_CHILD_NODES = [
        [
            "name" => "subNumber",
            "value" => self::SUB_NUMBER,
            "attributes" => [],
        ],
        [
            "name" => "streetNumber",
            "value" => self::STREET_NUMBER,
            "attributes" => [],
        ],
        [
            "name" => "street",
            "value" => self::STREET,
            "attributes" => [],
        ],
        [
            "name" => "suburb",
            "value" => self::SUBURB,
            "attributes" => [],
        ],
        [
            "name" => "state",
            "value" => self::STATE,
            "attributes" => [],
        ],
        [
            "name" => "postcode",
            "value" => self::POSTCODE,
            "attributes" => [],
        ],
        [
            "name" => "country",
            "value" => self::COUNTRY,
            "attributes" => [],
        ],
        [
            "name" => "site",
            "value" => self::SITE,
            "attributes" => [],
        ],
        [
            "name" => "lotNumber",
            "value" => self::LOT_NUMBER,
            "attributes" => [],
        ],
        [
            "name" => "region",
            "value" => self::REGION,
            "attributes" => [],
        ],
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->defaultTestAddress = new Address($this->generateXml("address", [], self::DEFAULT_CHILD_NODES));
    }

    public function nodeClass(): string
    {
        return Address::class;
    }

    public function test_has_the_correct_sub_number_value()
    {
        $this->assertEquals(self::SUB_NUMBER, $this->defaultTestAddress->subNumber->text);
    }

    public function test_has_the_correct_street_number_value()
    {
        $this->assertEquals(self::STREET_NUMBER, $this->defaultTestAddress->streetNumber->text);
    }

    public function test_has_the_correct_street_value()
    {
        $this->assertEquals(self::STREET, $this->defaultTestAddress->street->text);
    }

    public function test_has_the_correct_suburb_value()
    {
        $this->assertEquals(self::SUBURB, $this->defaultTestAddress->suburb->text);
    }

    public function test_has_the_correct_state_value()
    {
        $this->assertEquals(self::STATE, $this->defaultTestAddress->state->text);
    }

    public function test_has_the_correct_postcode_value()
    {
        $this->assertEquals(self::POSTCODE, $this->defaultTestAddress->postcode->text);
    }

    public function test_has_the_correct_country_value()
    {
        $this->assertEquals(self::COUNTRY, $this->defaultTestAddress->country->text);
    }

    public function test_has_the_correct_site_value()
    {
        $this->assertEquals(self::SITE, $this->defaultTestAddress->site->text);
    }

    public function test_has_the_correct_lot_number_value()
    {
        $this->assertEquals(self::LOT_NUMBER, $this->defaultTestAddress->lotNumber->text);
    }

    public function test_has_the_correct_region_value()
    {
        $this->assertEquals(self::REGION, $this->defaultTestAddress->region->text);
    }

    public function test_display_is_null_when_there_is_no_display_attribute()
    {
        $this->assertNull($this->defaultTestAddress->display);
    }

    public function test_display_is_yes_when_display_attribute_is_yes()
    {
        $xml = $this->generateXml("address", ["display" => "yes"], self::DEFAULT_CHILD_NODES);
        $address = new Address($xml);
        $this->assertEquals(YesNoEnum::YES->value, $address->display->value);
    }

    public function test_display_is_no_when_display_attribute_is_no()
    {
        $xml = $this->generateXml("address", ["display" => "no"], self::DEFAULT_CHILD_NODES);
        $address = new Address($xml);
        $this->assertEquals(YesNoEnum::NO->value, $address->display->value);
    }

    public function test_streetview_is_yes_when_streetview_attribute_is_yes()
    {
        $xml = $this->generateXml("address", ["streetview" => "yes"], self::DEFAULT_CHILD_NODES);
        $address = new Address($xml);
        $this->assertEquals(YesNoEnum::YES->value, $address->streetview->value);
    }

    public function test_streetview_is_no_when_streetview_attribute_is_no()
    {
        $xml = $this->generateXml("address", ["streetview" => "no"], self::DEFAULT_CHILD_NODES);
        $address = new Address($xml);
        $this->assertEquals(YesNoEnum::NO->value, $address->streetview->value);
    }
}
