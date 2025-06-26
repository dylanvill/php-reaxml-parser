<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Area;
use AdGroup\ReaxmlParser\Nodes\CrossOver;
use AdGroup\ReaxmlParser\Nodes\Depth;
use AdGroup\ReaxmlParser\Nodes\Frontage;
use AdGroup\ReaxmlParser\Nodes\LandDetails;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class LandDetailsTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return LandDetails::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return LandDetails::class;
    }

    public function test_all_properties_are_null_when_there_are_no_xml_child_elements(): void
    {
        $properties = ["area", "frontage", "depth", "crossOver"];

        $xml = $this->generateXml(LandDetails::NODE_NAME);
        $landDetails = new LandDetails($xml);

        foreach ($properties as $property) {
            $this->assertNull($landDetails->{$property});
        }
    }

    public function test_area_is_instantiated_properly_when_area_element_is_present(): void
    {
        $xml = $this->generateXml(LandDetails::NODE_NAME, [], [
            [
                "name" => Area::NODE_NAME,
                "value" => "",
                "attributes" => []
            ]
        ]);
        $landDetails = new LandDetails($xml);

        $this->assertInstanceOf(Area::class, $landDetails->area);
    }

    public function test_frontage_is_instantiated_properly_when_frontage_element_is_present(): void
    {
        $xml = $this->generateXml(LandDetails::NODE_NAME, [], [
            [
                "name" => Frontage::NODE_NAME,
                "value" => "",
                "attributes" => []
            ]
        ]);
        $landDetails = new LandDetails($xml);

        $this->assertInstanceOf(Frontage::class, $landDetails->frontage);
    }

    public function test_cross_over_is_instantiated_properly_when_cross_over_element_is_present(): void
    {
        $xml = $this->generateXml(LandDetails::NODE_NAME, [], [
            [
                "name" => CrossOver::NODE_NAME,
                "value" => "",
                "attributes" => []
            ]
        ]);
        $landDetails = new LandDetails($xml);

        $this->assertInstanceOf(CrossOver::class, $landDetails->crossOver);
    }

    public function test_depth_is_instantiated_as_an_array_when_depth_element_is_present_with_data(): void
    {
        $xml = $this->generateXml(LandDetails::NODE_NAME, [], [
            [
                "name" => Depth::NODE_NAME,
                "value" => "depth-1",
                "attributes" => []
            ]
        ]);
        $landDetails = new LandDetails($xml);

        $this->assertIsArray($landDetails->depth);
    }

    public function test_depth_classes_are_instantiated_when_depth_element_is_present(): void
    {
        $xml = $this->generateXml(LandDetails::NODE_NAME, [], [
            [
                "name" => Depth::NODE_NAME,
                "value" => "depth-1",
                "attributes" => []
            ],
        ]);
        $landDetails = new LandDetails($xml);



        $this->assertInstanceOf(Depth::class, $landDetails->depth[0]);
    }

    public function test_depth_is_not_instantiated_when_it_does_not_contain_any_data(): void
    {
        $xml = $this->generateXml(LandDetails::NODE_NAME, [], [
            [
                "name" => Depth::NODE_NAME,
                "value" => "",
                "attributes" => []
            ],
        ]);
        $landDetails = new LandDetails($xml);

        $this->assertNull($landDetails->depth);
    }
}
