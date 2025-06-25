<?php

namespace AdGroup\ReaxmlParser\Tests\Traits;

use AdGroup\ReaxmlParser\Contracts\ListingType;
use AdGroup\ReaxmlParser\Enums\ListingStatusEnum;
use AdGroup\ReaxmlParser\Tests\ListingTypes\Stubs\DummyCustomNode;
use SimpleXMLElement;

trait TestsListingType
{
    use GeneratesSampleXml;

    /**
     * Returns the node name of the listing class
     *
     * @return string
     */
    abstract protected function nodeName(): string;

    /**
     * Returns the class name of the listing class
     *
     * @return ListingType
     */
    abstract protected function nodeClass(): string;

    /**
     * Returns a single-dimension array that contains all the property
     * names of the listing type's XML properties e.g.: `["agentId",
     * "uniqueId", "listingAgent", ...]`
     *
     * @return array
     */
    abstract protected function xmlProperties(): array;

    /**
     * Returns an array with the key of the XML node name and an array value with the following structure:
     * `["class" => "name-of-the-xml-class", "property" => "name-of-the-xml-class-property"]`
     * 
     * Full example:
     * ```
     * [
     *  "agentId" => [
     *      "class" => "AgentId",
     *      "property" => "agentId"
     *  ]
     * ]
     * ```
     * @return array
     */
    abstract protected function xmlClassAndPropertyMapping(): array;

    private function createListingTypeInstance(SimpleXMLElement $xml): ListingType
    {
        $class = $this->nodeClass();
        return new $class($xml);
    }

    private function generateXmlChildren(): array
    {
        $map = $this->xmlClassAndPropertyMapping();

        return array_map(
            fn($name) => [
                "value" => "test-value",
                "attributes" => [],
                "name" => $name
            ],
            array_keys($map)
        );
    }

    public function test_mod_time_is_null(): void
    {
        $instance = $this->createListingTypeInstance(
            $this->generateXml($this->nodeName())
        );

        $this->assertNull($instance->modTime);
    }

    public function test_mod_time_has_the_correct_value(): void
    {
        $instance = $this->createListingTypeInstance(
            $this->generateXml($this->nodeName(), ["modTime" => "mod-time-test"])
        );

        $this->assertEquals("mod-time-test", $instance->modTime);
    }

    public function test_status_is_null(): void
    {
        $instance = $this->createListingTypeInstance(
            $this->generateXml($this->nodeName())
        );

        $this->assertNull($instance->modTime);
    }

    public function test_status_has_the_correct_value(): void
    {
        $instance = $this->createListingTypeInstance(
            $this->generateXml($this->nodeName(), ["status" => "current"])
        );

        $this->assertEquals(ListingStatusEnum::CURRENT, $instance->status);
    }

    public function test_status_is_null_when_it_is_not_part_of_the_expected_values(): void
    {
        $instance = $this->createListingTypeInstance(
            $this->generateXml($this->nodeName(), ["status" => "random-value"])
        );

        $this->assertNull($instance->status);
    }

    public function test_all_properties_are_null_when_there_is_no_appropriate_xml_element_to_map(): void
    {
        $instance = $this->createListingTypeInstance(
            $this->generateXml($this->nodeName())
        );

        $classProperties = $this->xmlProperties();

        foreach ($classProperties as $property) {
            $this->assertNull($instance->{$property});
        }
    }

    public function test_all_xml_properties_are_instantiated_correctly(): void
    {
        $map = $this->xmlClassAndPropertyMapping();
        $instance = $this->createListingTypeInstance(
            $this->generateXml($this->nodeName(), [], $this->generateXmlChildren())
        );

        foreach ($map as $key => $value) {
            $propertyValue = is_array($instance->{$value["property"]}) ? $instance->{$value["property"]}[0] : $instance->{$value["property"]};
            $this->assertInstanceOf($value["class"], $propertyValue);
        }
    }

    public function test_listing_class_contains_an_extra_element_property(): void
    {
        $instance = $this->createListingTypeInstance(
            $this->generateXml($this->nodeName(), [], $this->generateXmlChildren())
        );

        $this->assertObjectHasProperty("extraElements", $instance);
        $this->assertIsArray($instance->extraElements);
    }

    public function test_listing_class_parses_the_extra_elements_properly(): void
    {
        $mappedXmlChildren = $this->generateXmlChildren();
        $extraElement = [
            "value" => "extra-element-value",
            "attributes" => [],
            "name" => "extraElement"
        ];

        $xmlNodes = array_merge($mappedXmlChildren, [$extraElement]);
        
        $instance = $this->createListingTypeInstance(
            $this->generateXml($this->nodeName(), [], $xmlNodes)
        );

        $this->assertArrayHasKey("extraElement", $instance->extraElements);
    }
}
