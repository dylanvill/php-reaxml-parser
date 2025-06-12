<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\CrossOver;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class CrossOverTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return CrossOver::class;
    }

    public function test_value_is_null_when_attributes_is_not_in_element(): void
    {
        $xml = $this->generateXml(CrossOver::NODE_NAME);
        $crossOver = new CrossOver($xml);

        $this->assertNull($crossOver->value);
    }

    public function test_value_contains_the_correct_value(): void
    {
        $xml = $this->generateXml(CrossOver::NODE_NAME, ["value" => "test"]);
        $crossOver = new CrossOver($xml);

        $this->assertEquals("test", $crossOver->value);
    }
}
