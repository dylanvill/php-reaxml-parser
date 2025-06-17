<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Page;
use AdGroup\ReaxmlParser\Nodes\Reference;
use AdGroup\ReaxmlParser\Nodes\StreetDirectory;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class StreetDirectoryTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return StreetDirectory::class;
    }

    public function test_page_is_null_when_there_is_no_page_element(): void
    {
        $xml = $this->generateXml(StreetDirectory::NODE_NAME);
        $streetDirectory = new StreetDirectory($xml);

        $this->assertNull($streetDirectory->page);
    }

    public function test_page_is_instantiated_properly_when_there_is_a_page_element(): void
    {
        $xml = $this->generateXml(StreetDirectory::NODE_NAME, [], [
            [
                "name" => Page::NODE_NAME,
                "attributes" => [],
                "value" => "test-page"
            ]
        ]);
        $streetDirectory = new StreetDirectory($xml);

        $this->assertInstanceOf(Page::class, $streetDirectory->page);
    }

    public function test_reference_is_null_when_there_is_no_reference_element(): void
    {
        $xml = $this->generateXml(StreetDirectory::NODE_NAME);
        $streetDirectory = new StreetDirectory($xml);

        $this->assertNull($streetDirectory->reference);
    }

    public function test_reference_is_instantiated_properly_when_there_is_a_reference_element(): void
    {
        $xml = $this->generateXml(StreetDirectory::NODE_NAME, [], [
            [
                "name" => Reference::NODE_NAME,
                "attributes" => [],
                "value" => "test-page"
            ]
        ]);
        $streetDirectory = new StreetDirectory($xml);

        $this->assertInstanceOf(Reference::class, $streetDirectory->reference);
    }

    public function test_type_is_null_when_there_is_no_type_attribute(): void
    {
        $xml = $this->generateXml(StreetDirectory::NODE_NAME);
        $streetDirectory = new StreetDirectory($xml);

        $this->assertNull($streetDirectory->type);
    }

    public function test_type_is_instantiated_properly_when_there_is_a_type_attribute(): void
    {
        $xml = $this->generateXml(StreetDirectory::NODE_NAME, ["type" => "melways"]);
        $streetDirectory = new StreetDirectory($xml);

        $this->assertEquals("melways", $streetDirectory->type);
    }
}
