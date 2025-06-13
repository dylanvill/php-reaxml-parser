<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\IsMultiple;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class IsMultipleTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return IsMultiple::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return IsMultiple::class;
    }

    public function test_value_is_null_when_there_is_no_value_attribute(): void
    {
        $xml = $this->generateXml(IsMultiple::NODE_NAME);
        $isMultiple = new IsMultiple($xml);

        $this->assertNull($isMultiple->value);
    }

    public function test_value_has_the_correct_value(): void
    {
        $xml = $this->generateXml(IsMultiple::NODE_NAME, ["value" => "yes"]);
        $isMultiple = new IsMultiple($xml);

        $this->assertEquals(YesNoEnum::YES, $isMultiple->value);
    }
}
