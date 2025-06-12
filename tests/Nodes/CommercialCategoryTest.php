<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\CommercialCategory;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class CommercialCategoryTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return CommercialCategory::class;
    }

    public function test_id_is_null_when_no_id_attribute_is_present(): void
    {
        $xml = $this->generateXml(CommercialCategory::NODE_NAME);
        $category = new CommercialCategory($xml);


        $this->assertNull($category->id);
    }

    public function test_id_has_the_correct_value(): void
    {
        $xml = $this->generateXml(CommercialCategory::NODE_NAME, ["id" => "1"]);
        $category = new CommercialCategory($xml);

        $this->assertEquals(1, $category->id);
        $this->assertIsInt($category->id);
    }

    public function test_name_is_null_when_no_name_attribute_is_present(): void
    {
        $xml = $this->generateXml(CommercialCategory::NODE_NAME);
        $category = new CommercialCategory($xml);


        $this->assertNull($category->name);
    }

    public function test_name_has_the_correct_value(): void
    {
        $xml = $this->generateXml(CommercialCategory::NODE_NAME, ["name" => "test-name"]);
        $category = new CommercialCategory($xml);

        $this->assertEquals("test-name", $category->name);
    }

    public function test_contains_all_the_correct_values_when_all_properties_are_present(): void
    {
        $xml = $this->generateXml(CommercialCategory::NODE_NAME, ["id" => "1", "name" => "test-name"]);
        $category = new CommercialCategory($xml);

        $this->assertEquals(1, $category->id);
        $this->assertEquals("test-name", $category->name);
    }
}
