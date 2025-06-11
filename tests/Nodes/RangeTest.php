<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Range;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class RangeTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    const TEST_VALUE = "yes";

    protected function nodeClass(): string
    {
        return Range::class;
    }

    public function test_min_and_max_is_null_when_there_are_no_child_nodes(): void
    {
        $xml = $this->generateXml("range", [], []);
        $range = new Range($xml);

        $this->assertNull($range->min);
        $this->assertNull($range->max);
    }

    public function test_min_and_max_value_contains_the_correct_value(): void
    {
        $xml = $this->generateXml(
            "range",
            [],
            [
                [
                    "name" => "min",
                    "value" => "1",
                    "attributes" => []
                ],
                [
                    "name" => "max",
                    "value" => "10",
                    "attributes" => []
                ]
            ]
        );

        $range = new Range($xml);

        $this->assertEquals("1", $range->min->text);
        $this->assertEquals("10", $range->max->text);
    }
}
