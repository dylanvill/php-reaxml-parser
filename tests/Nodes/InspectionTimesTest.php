<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\InspectionTimes;
use AdGroup\ReaxmlParser\Nodes\Inspection;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class InspectionTimesTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return InspectionTimes::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return InspectionTimes::class;
    }

    public function test_inspection_is_null_when_there_is_no_child_element(): void
    {
        $xml = $this->generateXml(InspectionTimes::NODE_NAME);
        $times = new InspectionTimes($xml);

        $this->assertNull($times->inspection);
    }

    public function test_no_inspection_are_instantiated_when_the_inspection_child_elements_are_empty(): void
    {
        $xml = $this->generateXml(InspectionTimes::NODE_NAME, [], [
            [
                "name" => Inspection::NODE_NAME,
                "value" => "",
                "attributes" => []
            ]
        ]);
        $times = new InspectionTimes($xml);

        $this->assertNull($times->inspection);
    }

    public function test_inspection_instantiates_only_valid_child_elements(): void
    {
        $xml = $this->generateXml(InspectionTimes::NODE_NAME, [], [
            [
                "name" => Inspection::NODE_NAME,
                "value" => "",
                "attributes" => []
            ],
            [
                "name" => Inspection::NODE_NAME,
                "value" => "inspection-test",
                "attributes" => []
            ],
            [
                "name" => Inspection::NODE_NAME,
                "value" => "inspection-test",
                "attributes" => []
            ]
        ]);
        $times = new InspectionTimes($xml);

        $this->assertCount(2, $times->inspection);
    }
}
