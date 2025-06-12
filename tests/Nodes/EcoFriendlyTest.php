<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\EcoFriendly;
use AdGroup\ReaxmlParser\Nodes\GreyWaterSystem;
use AdGroup\ReaxmlParser\Nodes\SolarHotWater;
use AdGroup\ReaxmlParser\Nodes\SolarPanels;
use AdGroup\ReaxmlParser\Nodes\WaterTank;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use Orchestra\Testbench\TestCase;

class EcoFriendlyTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return EcoFriendly::class;
    }

    public function test_properties_are_null_when_there_are_no_child_elements(): void
    {
        $xml = $this->generateXml(EcoFriendly::NODE_NAME);
        $ecoFriendly = new EcoFriendly($xml);

        $this->assertNull($ecoFriendly->solarPanels);
        $this->assertNull($ecoFriendly->solarHotWater);
        $this->assertNull($ecoFriendly->waterTank);
        $this->assertNull($ecoFriendly->greyWaterSystem);
    }

    public function test_solar_panel_contains_the_correct_value(): void
    {
        $xml = $this->generateXml(EcoFriendly::NODE_NAME, [], [
            [
                "name" => SolarPanels::NODE_NAME,
                "value" => "yes",
                "attributes" => []
            ]
        ]);
        $ecoFriendly = new EcoFriendly($xml);

        $this->assertEquals("yes", $ecoFriendly->solarPanels->text);
    }

    public function test_solar_hot_water_contains_the_correct_value(): void
    {
        $xml = $this->generateXml(EcoFriendly::NODE_NAME, [], [
            [
                "name" => SolarHotWater::NODE_NAME,
                "value" => "yes",
                "attributes" => []
            ]
        ]);
        $ecoFriendly = new EcoFriendly($xml);

        $this->assertEquals("yes", $ecoFriendly->solarHotWater->text);
    }

    public function test_water_tank_contains_the_correct_value(): void
    {
        $xml = $this->generateXml(EcoFriendly::NODE_NAME, [], [
            [
                "name" => WaterTank::NODE_NAME,
                "value" => "yes",
                "attributes" => []
            ]
        ]);
        $ecoFriendly = new EcoFriendly($xml);

        $this->assertEquals("yes", $ecoFriendly->waterTank->text);
    }

    public function test_grey_water_system_contains_the_correct_value(): void
    {
        $xml = $this->generateXml(EcoFriendly::NODE_NAME, [], [
            [
                "name" => GreyWaterSystem::NODE_NAME,
                "value" => "yes",
                "attributes" => []
            ]
        ]);
        $ecoFriendly = new EcoFriendly($xml);

        $this->assertEquals("yes", $ecoFriendly->greyWaterSystem->text);
    }
}
