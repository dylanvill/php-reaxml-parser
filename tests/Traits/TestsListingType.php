<?php

namespace AdGroup\ReaxmlParser\Tests\Traits;

use AdGroup\ReaxmlParser\Contracts\ListingType;
use AdGroup\ReaxmlParser\Enums\ListingStatusEnum;
use AdGroup\ReaxmlParser\Tests\ListingTypes\Stubs\DummyCustomNode;

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
    abstract protected function nodeClass(): ListingType;

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

    public function test_mod_time_is_null(): void
    {
        $xml = $this->generateXml($this->nodeName());

        $listingType = $this->nodeClass();
        $listingType->map($xml);

        $this->assertNull($listingType->modTime);
    }

    public function test_mod_time_has_the_correct_value(): void
    {
        $xml = $this->generateXml($this->nodeName(), ["modTime" => "mod-time-test"]);

        $listingType = $this->nodeClass();
        $listingType->map($xml);

        $this->assertEquals("mod-time-test", $listingType->modTime);
    }

    public function test_status_is_null(): void
    {
        $xml = $this->generateXml($this->nodeName());

        $listingType = $this->nodeClass();
        $listingType->map($xml);

        $this->assertNull($listingType->modTime);
    }

    public function test_status_has_the_correct_value(): void
    {
        $xml = $this->generateXml($this->nodeName(), ["status" => "current"]);

        $listingType = $this->nodeClass();
        $listingType->map($xml);

        $this->assertEquals(ListingStatusEnum::CURRENT, $listingType->status);
    }

    public function test_status_is_null_when_it_is_not_part_of_the_expected_values(): void
    {
        $xml = $this->generateXml($this->nodeName(), ["status" => "random-value"]);

        $listingType = $this->nodeClass();
        $listingType->map($xml);

        $this->assertNull($listingType->status);
    }

    public function test_all_properties_are_initially_null(): void
    {
        $xml = $this->generateXml($this->nodeName());

        $listingType = $this->nodeClass();
        $listingType->map($xml);

        $classProperties = $this->xmlProperties();

        foreach ($classProperties as $property) {
            $this->assertNull($listingType->{$property});
        }
    }

    public function test_all_xml_properties_are_instantiated_correctly(): void
    {
        $map = $this->xmlClassAndPropertyMapping();

        $xmlNodes = array_map(
            fn($name) => [
                "value" => "test-value",
                "attributes" => [],
                "name" => $name
            ],
            array_keys($map)
        );

        $xml = $this->generateXml($this->nodeName(), [], $xmlNodes);

        $listingType = $this->nodeClass();
        $listingType->map($xml);

        foreach ($map as $key => $value) {
            $propertyValue = is_array($listingType->{$value["property"]}) ? $listingType->{$value["property"]}[0] : $listingType->{$value["property"]};
            $this->assertInstanceOf($value["class"], $propertyValue);
        }
    }

    public function test_mapping_additional_properties_is_working_correctly(): void
    {
        $map = $this->xmlClassAndPropertyMapping();

        $xmlNodes = array_map(
            fn($name) => [
                "value" => "test-value",
                "attributes" => [],
                "name" => $name
            ],
            array_keys($map)
        );
        $xmlNodes[] = [
            "name" => DummyCustomNode::NODE_NAME,
            "attributes" => [],
            "value" => "dummy-custom-node-test"
        ];

        $xml = $this->generateXml($this->nodeName(), [], $xmlNodes);

        $listingType = $this->nodeClass();
        $listingType->addMapping([
            DummyCustomNode::NODE_NAME => fn(?array $node) => $listingType->{DummyCustomNode::NODE_NAME} = new DummyCustomNode($node[0])
        ]);
        $listingType->map($xml);

        $this->assertInstanceOf(DummyCustomNode::class, $listingType->{DummyCustomNode::NODE_NAME});
    }
}
