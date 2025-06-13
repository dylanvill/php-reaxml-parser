<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\LandCategory;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class LandCategoryTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return LandCategory::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return LandCategory::class;
    }

    public function test_name_is_null_when_there_is_no_name_attribute(): void
    {
        $xml = $this->generateXml(LandCategory::NODE_NAME);
        $category = new LandCategory($xml);

        $this->assertNull($category->name);
    }

    public function test_value_has_the_correct_value(): void
    {
        $xml = $this->generateXml(LandCategory::NODE_NAME, ["name" => "Residential"]);
        $category = new LandCategory($xml);

        $this->assertEquals("Residential", $category->name);
    }
}
