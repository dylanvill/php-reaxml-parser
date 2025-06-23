<?php

namespace AdGroup\ReaxmlParser\Tests\Traits;

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
     * @return string
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

    public function test_mod_time_is_null(): void
    {
        $xml = $this->generateXml($this->nodeName());
        $class = $this->nodeClass();
        $instance = new $class($xml);

        $this->assertNull($instance->modTime);
    }

    public function test_mod_time_has_the_correct_value(): void
    {
        $xml = $this->generateXml($this->nodeName(), ["modTime" => "mod-time-test"]);
        $class = $this->nodeClass();
        $instance = new $class($xml);

        $this->assertEquals("mod-time-test", $instance->modTime);
    }

    public function test_status_is_null(): void
    {
        $xml = $this->generateXml($this->nodeName());
        $class = $this->nodeClass();
        $instance = new $class($xml);

        $this->assertNull($instance->modTime);
    }

    public function test_status_has_the_correct_value(): void
    {
        $xml = $this->generateXml($this->nodeName(), ["status" => "current"]);
        $class = $this->nodeClass();
        $instance = new $class($xml);

        $this->assertEquals(ListingStatusEnum::CURRENT, $instance->status);
    }

    public function test_status_is_null_when_it_is_not_part_of_the_expected_values(): void
    {
        $xml = $this->generateXml($this->nodeName(), ["status" => "random-value"]);
        $class = $this->nodeClass();
        $instance = new $class($xml);

        $this->assertNull($instance->status);
    }

    public function test_all_properties_are_initially_null(): void
    {
        $xml = $this->generateXml($this->nodeName());
        $class = $this->nodeClass();
        $instance = new $class($xml);

        $classProperties = $this->xmlProperties();

        foreach ($classProperties as $property) {
            $this->assertNull($instance->{$property});
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

        $class = $this->nodeClass();
        $listingClass = (new $class($xml))->map();

        foreach ($map as $key => $value) {
            $propertyValue = is_array($listingClass->{$value["property"]}) ? $listingClass->{$value["property"]}[0] : $listingClass->{$value["property"]};
            $this->assertInstanceOf($value["class"], $propertyValue);
        }
    }

    public function test_mapping_override_is_working_correctly(): void
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
        $class = $this->nodeClass();
        $listingClass = new $class($xml);

        $listingClass->addMapping([
            DummyCustomNode::NODE_NAME => fn(?array $node) => $listingClass->{DummyCustomNode::NODE_NAME} = new DummyCustomNode($node[0])
        ]);
        $listingClass->map();

        $this->assertInstanceOf(DummyCustomNode::class, $listingClass->{DummyCustomNode::NODE_NAME});
    }
}
