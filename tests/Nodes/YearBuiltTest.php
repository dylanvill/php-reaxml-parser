<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\YearBuilt;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class YearBuiltTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return YearBuilt::class;
    }

    public function test_value_is_null_when_there_is_no_value_attribute(): void
    {
        $xml = $this->generateXml(YearBuilt::NODE_NAME);
        $yearBuilt = new YearBuilt($xml);

        $this->assertNull($yearBuilt->value);
    }

    public function test_value_has_the_correct_value(): void
    {
        $xml = $this->generateXml(YearBuilt::NODE_NAME, ["value" => "value-test"]);
        $yearBuilt = new YearBuilt($xml);

        $this->assertEquals("value-test", $yearBuilt->value);
    }
}
