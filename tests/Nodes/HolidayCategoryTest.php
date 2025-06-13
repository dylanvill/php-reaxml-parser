<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\HolidayCategory;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class HolidayCategoryTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return HolidayCategory::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return HolidayCategory::class;
    }

    public function test_name_is_null_when_there_is_no_name_attribute(): void
    {
        $xml = $this->generateXml(HolidayCategory::NODE_NAME);
        $category = new HolidayCategory($xml);

        $this->assertNull($category->name);
    }

    public function test_name_has_the_correct_value(): void
    {
        $xml = $this->generateXml(HolidayCategory::NODE_NAME, ["name" => "Alpine"]);
        $category = new HolidayCategory($xml);

        $this->assertEquals("Alpine", $category->name);
    }
}
