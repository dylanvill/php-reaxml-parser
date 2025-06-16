<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\RuralCategory;
use AdGroup\ReaxmlParser\Nodes\Fencing;
use AdGroup\ReaxmlParser\Nodes\AnnualRainfall;
use AdGroup\ReaxmlParser\Nodes\SoilTypes;
use AdGroup\ReaxmlParser\Nodes\Improvements;
use AdGroup\ReaxmlParser\Nodes\CouncilRates;
use AdGroup\ReaxmlParser\Nodes\Irrigation;
use AdGroup\ReaxmlParser\Nodes\CarryingCapacity;
use AdGroup\ReaxmlParser\Nodes\Services;
use AdGroup\ReaxmlParser\Nodes\RuralFeatures;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class RuralFeaturesTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return RuralCategory::class;
    }

    public function test_all_elements_are_null_when_nochild_elements_are_present(): void
    {
        $elements = [
            'fencing',
            'annualRainfall',
            'soilTypes',
            'improvements',
            'councilRates',
            'irrigation',
            'carryingCapacity',
            'services',
        ];

        $xml = $this->generateXml(RuralFeatures::NODE_NAME);
        $features = new RuralFeatures($xml);

        foreach ($elements as $property) {
            $this->assertNull($features->{$property});
        }
    }

    public function test_all_elements_are_instantiated_properly_when_they_are_present_and_have_a_value(): void
    {
        $map = [
            Fencing::NODE_NAME => [
                "class" => Fencing::class,
                "property" => "fencing"
            ],
            AnnualRainfall::NODE_NAME => [
                "class" => AnnualRainfall::class,
                "property" => "annualRainfall"
            ],
            SoilTypes::NODE_NAME => [
                "class" => SoilTypes::class,
                "property" => "soilTypes"
            ],
            Improvements::NODE_NAME => [
                "class" => Improvements::class,
                "property" => "improvements"
            ],
            CouncilRates::NODE_NAME => [
                "class" => CouncilRates::class,
                "property" => "councilRates"
            ],
            Irrigation::NODE_NAME => [
                "class" => Irrigation::class,
                "property" => "irrigation"
            ],
            CarryingCapacity::NODE_NAME => [
                "class" => CarryingCapacity::class,
                "property" => "carryingCapacity"
            ],
            Services::NODE_NAME => [
                "class" => Services::class,
                "property" => "services"
            ],
        ];

        $xmlNodes = [];
        foreach ($map as $key => $value) {
            $xmlNodes[] = [
                "name" => $key,
                "value" => "test",
                "attributes" => []
            ];
        }

        $xml = $this->generateXml(RuralFeatures::NODE_NAME, [], $xmlNodes);
        $features = new RuralFeatures($xml);

        foreach ($map as $key => $value) {
            $this->assertInstanceOf($value["class"], $features->{$value["property"]});
        }
    }
}
