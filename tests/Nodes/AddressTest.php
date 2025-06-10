<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\Address;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use Orchestra\Testbench\PHPUnit\TestCase;
use SimpleXMLElement;

class AddressTest extends TestCase
{
    use TestsNodeValidation;

    private Address $defaultTestAddress;

    private const DEFAULTS = [
        'subNumber' => '2',
        'streetNumber' => '39',
        'street' => 'Main Road',
        'suburb' => 'RICHMOND',
        'state' => 'vic',
        'postcode' => '3121',
        'country' => 'AUS',
        'site' => 'test site',
        'lotNumber' => 'test lot number',
        'region' => 'test region',
    ];

    public function setUp(): void
    {
        parent::setUp();
        $this->defaultTestAddress = new Address($this->generateAddressXml());
    }

    private function generateAddressXml(array $overrides = [], array $attributes = []): SimpleXMLElement
    {
        $elements = array_merge(self::DEFAULTS, $overrides);
        $attrString = '';

        foreach ($attributes as $key => $value) {
            $attrString .= " {$key}=\"{$value}\"";
        }

        $xml = "<address{$attrString}>";
        foreach ($elements as $key => $value) {
            $xml .= "<{$key}>{$value}</{$key}>";
        }
        $xml .= "</address>";

        return simplexml_load_string($xml);
    }

    public function nodeClass(): string
    {
        return Address::class;
    }

    public function test_has_the_correct_sub_number_value()
    {
        $this->assertEquals(self::DEFAULTS['subNumber'], $this->defaultTestAddress->subNumber->text);
    }

    public function test_has_the_correct_street_number_value()
    {
        $this->assertEquals(self::DEFAULTS['streetNumber'], $this->defaultTestAddress->streetNumber->text);
    }

    public function test_has_the_correct_street_value()
    {
        $this->assertEquals(self::DEFAULTS['street'], $this->defaultTestAddress->street->text);
    }

    public function test_has_the_correct_suburb_value()
    {
        $this->assertEquals(self::DEFAULTS['suburb'], $this->defaultTestAddress->suburb->text);
    }

    public function test_has_the_correct_state_value()
    {
        $this->assertEquals(self::DEFAULTS['state'], $this->defaultTestAddress->state->text);
    }

    public function test_has_the_correct_postcode_value()
    {
        $this->assertEquals(self::DEFAULTS['postcode'], $this->defaultTestAddress->postcode->text);
    }

    public function test_has_the_correct_country_value()
    {
        $this->assertEquals(self::DEFAULTS['country'], $this->defaultTestAddress->country->text);
    }

    public function test_has_the_correct_site_value()
    {
        $this->assertEquals(self::DEFAULTS['site'], $this->defaultTestAddress->site->text);
    }

    public function test_has_the_correct_lot_number_value()
    {
        $this->assertEquals(self::DEFAULTS['lotNumber'], $this->defaultTestAddress->lotNumber->text);
    }

    public function test_has_the_correct_region_value()
    {
        $this->assertEquals(self::DEFAULTS['region'], $this->defaultTestAddress->region->text);
    }

    public function test_display_is_null_when_there_is_no_display_attribute()
    {
        $this->assertNull($this->defaultTestAddress->display);
    }

    public function test_display_is_yes_when_display_attribute_is_yes()
    {
        $xml = $this->generateAddressXml([], ['display' => 'yes']);
        $address = new Address($xml);
        $this->assertEquals(YesNoEnum::YES->value, $address->display->value);
    }

    public function test_display_is_no_when_display_attribute_is_no()
    {
        $xml = $this->generateAddressXml([], ['display' => 'no']);
        $address = new Address($xml);
        $this->assertEquals(YesNoEnum::NO->value, $address->display->value);
    }

    public function test_streetview_is_yes_when_streetview_attribute_is_yes()
    {
        $xml = $this->generateAddressXml([], ['streetview' => 'yes']);
        $address = new Address($xml);
        $this->assertEquals(YesNoEnum::YES->value, $address->streetview->value);
    }

    public function test_streetview_is_no_when_streetview_attribute_is_no()
    {
        $xml = $this->generateAddressXml([], ['streetview' => 'no']);
        $address = new Address($xml);
        $this->assertEquals(YesNoEnum::NO->value, $address->streetview->value);
    }
}
