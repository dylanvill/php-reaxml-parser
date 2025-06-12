<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Category;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class CategoryTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return Category::class;
    }

    public function test_name_is_null_when_there_is_no_name_attribute(): void
    {
        $xml = $this->generateXml(Category::NODE_NAME);
        $category = new Category($xml);

        $this->assertNull($category->name);
    }

    public function test_name_is_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Category::NODE_NAME, ["name" => "House"]);
        $category = new Category($xml);

        $this->assertEquals("House", $category->name);
    }
}
