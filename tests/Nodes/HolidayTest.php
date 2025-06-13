<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\Holiday;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class HolidayTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Holiday::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Holiday::class;
    }

    public function test_value_is_null_when_there_is_no_value_attribute(): void
    {
        $xml = $this->generateXml(Holiday::NODE_NAME);
        $holiday = new Holiday($xml);

        $this->assertNull($holiday->value);
    }

    public function test_value_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Holiday::NODE_NAME, ["value" => "yes"]);
        $holiday = new Holiday($xml);

        $this->assertEquals(YesNoEnum::YES, $holiday->value);
    }
}
