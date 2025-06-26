<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\VendorDetails;
use AdGroup\ReaxmlParser\Nodes\Name;
use AdGroup\ReaxmlParser\Nodes\Telephone;
use AdGroup\ReaxmlParser\Nodes\Email;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class VendorDetailsTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return VendorDetails::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return VendorDetails::class;
    }

    public function test_properties_are_null_when_there_are_no_child_elements(): void
    {
        $properties = ["name", "telephone", "email"];

        $xml = $this->generateXml(VendorDetails::NODE_NAME);
        $vendorDetails = new VendorDetails($xml);

        foreach ($properties as $property) {
            $this->assertNull($vendorDetails->{$property});
        }
    }

    public function test_properties_are_instantiated_correctly_when_child_elements_are_present(): void
    {
        $map = [
            Name::NODE_NAME => ["class" => Name::class, "property" => "name"],
            Telephone::NODE_NAME => ["class" => Telephone::class, "property" => "telephone"],
            Email::NODE_NAME => ["class" => Email::class, "property" => "email"],
        ];

        $childNodes = [];
        foreach ($map as $key => $value) {
            $childNodes[] = [
                "name" => $key,
                "attributes" => [],
                "value" => "test-value"
            ];
        }

        $xml = $this->generateXml(VendorDetails::NODE_NAME, [], $childNodes);
        $vendorDetails = new VendorDetails($xml);

        foreach ($map as $key => $value) {
            $this->assertInstanceOf($value["class"], $vendorDetails->{$value["property"]});
        }
    }
}
