<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\RuralCategory;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class RuralCategoryTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return RuralCategory::class;
    }

    public function test_name_is_null_when_there_is_no_name_attribute(): void
    {
        $xml = $this->generateXml(RuralCategory::NODE_NAME);
        $category = new RuralCategory($xml);

        $this->assertNull($category->name);
    }

    public function test_period_has_the_correct_value(): void
    {
        $xml = $this->generateXml(RuralCategory::NODE_NAME, ["name" => "Cropping"]);
        $category = new RuralCategory($xml);

        $this->assertEquals("Cropping", $category->name);
    }
}
