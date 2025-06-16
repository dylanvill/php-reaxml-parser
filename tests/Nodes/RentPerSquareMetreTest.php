<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\RentPerSquareMetre;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class RentPerSquareMetreTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return RentPerSquareMetre::class;
    }

    public function test_range_is_null_when_there_is_no_range_child_element(): void
    {
        $xml = $this->generateXml(RentPerSquareMetre::NODE_NAME);
        $rentPerSquareMetre = new RentPerSquareMetre($xml);

        $this->assertNull($rentPerSquareMetre->range);
    }

    public function test_range_is_not_null_when_range_is_present(): void
    {
        $xml = $this->generateXml(RentPerSquareMetre::NODE_NAME, [], [
            [
                "name" => "range",
                "attributes" => [],
                "value" => ""
            ]
        ]);
        $rentPerSquareMetre = new RentPerSquareMetre($xml);

        $this->assertNotNull($rentPerSquareMetre->range);
    }
}
