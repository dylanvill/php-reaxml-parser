<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\YearLastRenovated;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class YearLastRenovatedTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return YearLastRenovated::class;
    }

    public function test_value_is_null_when_there_is_no_value_attribute(): void
    {
        $xml = $this->generateXml(YearLastRenovated::NODE_NAME);
        $yearLastRenovated = new YearLastRenovated($xml);

        $this->assertNull($yearLastRenovated->value);
    }

    public function test_value_has_the_correct_value(): void
    {
        $xml = $this->generateXml(YearLastRenovated::NODE_NAME, ["value" => "value-test"]);
        $yearLastRenovated = new YearLastRenovated($xml);

        $this->assertEquals("value-test", $yearLastRenovated->value);
    }
}
