<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\EField;
use AdGroup\ReaxmlParser\Nodes\ExtraFields;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class ExtraFieldsTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string {
        return ExtraFields::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return ExtraFields::class;
    }

    public function test_table_is_null_when_there_is_no_table_attribute(): void
    {
        $xml = $this->generateXml(ExtraFields::NODE_NAME);
        $extraFields = new ExtraFields($xml);

        $this->assertNull($extraFields->table);
    }

    public function test_table_is_the_correct_value(): void
    {
        $xml = $this->generateXml(ExtraFields::NODE_NAME, ["table" => "table-test"]);
        $extraFields = new ExtraFields($xml);

        $this->assertEquals("table-test", $extraFields->table);
    }

    public function test_e_field_is_null_when_there_are_no_e_field_elements(): void
    {
        $xml = $this->generateXml(ExtraFields::NODE_NAME);
        $extraFields = new ExtraFields($xml);

        $this->assertNull($extraFields->eField);
    }

    public function test_e_field_is_an_array_when_the_e_field_elements_are_present(): void
    {
        $xml = $this->generateXml(ExtraFields::NODE_NAME, [], [
            [
                "name" => EField::NODE_NAME,
                "value" => "test-1",
                "attributes" => []
            ]
        ]);
        $extraFields = new ExtraFields($xml);

        $this->assertIsArray($extraFields->eField);
    }

    public function test_the_correct_number_of_e_fields_is_instantiated(): void
    {
        $xml = $this->generateXml(ExtraFields::NODE_NAME, [], [
            [
                "name" => EField::NODE_NAME,
                "value" => "test-1",
                "attributes" => []
            ],
            [
                "name" => EField::NODE_NAME,
                "value" => "test-2",
                "attributes" => []
            ],
            [
                "name" => EField::NODE_NAME,
                "value" => "test-3",
                "attributes" => []
            ],
        ]);
        $extraFields = new ExtraFields($xml);

        $this->assertCount(3, $extraFields->eField);
    }

    public function test_only_e_fields_with_values_are_instantiated(): void
    {
        $xml = $this->generateXml(ExtraFields::NODE_NAME, [], [
            [
                "name" => EField::NODE_NAME,
                "value" => "test-1",
                "attributes" => []
            ],
            [
                "name" => EField::NODE_NAME,
                "value" => "",
                "attributes" => []
            ],
            [
                "name" => EField::NODE_NAME,
                "value" => "test-3",
                "attributes" => []
            ],
        ]);
        $extraFields = new ExtraFields($xml);

        $this->assertCount(2, $extraFields->eField);
    }
}
