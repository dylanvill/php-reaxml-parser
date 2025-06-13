<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Exclusivity;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class ExclusivityTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return Exclusivity::class;
    }

    public function test_value_is_null_when_attribute_is_null(): void
    {
        $xml = $this->generateXml(Exclusivity::NODE_NAME);
        $exlusivity = new Exclusivity($xml);

        $this->assertNull($exlusivity->value);
    }

    public function test_value_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Exclusivity::NODE_NAME, ["value" => "exclusive"]);
        $exlusivity = new Exclusivity($xml);

        $this->assertEquals("exclusive", $exlusivity->value);
    }
}
