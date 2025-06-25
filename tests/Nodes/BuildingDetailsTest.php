<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Area;
use AdGroup\ReaxmlParser\Nodes\BuildingDetails;
use AdGroup\ReaxmlParser\Nodes\EnergyRating;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class BuildingDetailsTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeClass(): string
    {
        return BuildingDetails::class;
    }

    protected function nodeName(): string
    {
        return BuildingDetails::NODE_NAME;
    }

    public function test_area_is_null_when_there_is_no_area_node(): void
    {
        $xml = $this->generateXml(BuildingDetails::NODE_NAME);
        $buildingDetails = new BuildingDetails($xml);

        $this->assertNull($buildingDetails->area);
    }

    public function test_area_contains_the_correct_value(): void
    {
        $xml = $this->generateXml(BuildingDetails::NODE_NAME, [], [
            [
                "name" => Area::NODE_NAME,
                "value" => "50",
                "attributes" => []
            ]
        ]);
        $buildingDetails = new BuildingDetails($xml);

        $this->assertEquals("50", $buildingDetails->area->text);
    }

    public function test_energy_rating_is_null_when_there_is_no_energy_rating_node(): void
    {
        $xml = $this->generateXml(BuildingDetails::NODE_NAME);
        $buildingDetails = new BuildingDetails($xml);

        $this->assertNull($buildingDetails->energyRating);
    }

    public function test_energy_rating_contains_the_correct_value(): void
    {
        $xml = $this->generateXml(BuildingDetails::NODE_NAME, [], [
            [
                "name" => EnergyRating::NODE_NAME,
                "value" => "50",
                "attributes" => []
            ]
        ]);
        $buildingDetails = new BuildingDetails($xml);

        $this->assertEquals("50", $buildingDetails->energyRating->text);
    }
}
