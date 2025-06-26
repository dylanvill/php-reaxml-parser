<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Document;
use AdGroup\ReaxmlParser\Nodes\Floorplan;
use AdGroup\ReaxmlParser\Nodes\Img;
use AdGroup\ReaxmlParser\Nodes\Objects;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class ObjectsTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeClass(): string
    {
        return Objects::class;
    }

    protected function nodeName(): string
    {
        return Objects::NODE_NAME;
    }

    public function test_properties_are_null_when_there_are_no_xml_elements(): void
    {
        $xml = $this->generateXml(Objects::NODE_NAME);
        $objects = new Objects($xml);

        $this->assertNull($objects->floorplan);
        $this->assertNull($objects->img);
        $this->assertNull($objects->document);
    }

    public function test_floorplan_is_instantiated_as_an_array_when_element_is_present(): void
    {
        $xml = $this->generateXml(Objects::NODE_NAME, [], [
            [
                "name" => Floorplan::NODE_NAME,
                "attributes" => [],
                "value" => "floorplan-test"
            ]
        ]);
        $objects = new Objects($xml);

        $this->assertIsArray($objects->floorplan);
    }

    public function test_floorplan_is_an_array_of_floorplan_class_instances(): void
    {
        $xml = $this->generateXml(Objects::NODE_NAME, [], [
            [
                "name" => Floorplan::NODE_NAME,
                "attributes" => [],
                "value" => "floorplan-test"
            ],
            [
                "name" => Floorplan::NODE_NAME,
                "attributes" => [],
                "value" => "floorplan-test"
            ],
            [
                "name" => Floorplan::NODE_NAME,
                "attributes" => [],
                "value" => "floorplan-test"
            ],
        ]);
        $objects = new Objects($xml);

        foreach ($objects->floorplan as $floorplan) {
            $this->assertInstanceOf(Floorplan::class, $floorplan);
        }
    }

    public function test_img_is_instantiated_as_an_array_when_element_is_present(): void
    {
        $xml = $this->generateXml(Objects::NODE_NAME, [], [
            [
                "name" => Img::NODE_NAME,
                "attributes" => [],
                "value" => "img-test"
            ]
        ]);
        $objects = new Objects($xml);

        $this->assertIsArray($objects->img);
    }

    public function test_img_is_an_array_of_img_class_instances(): void
    {
        $xml = $this->generateXml(Objects::NODE_NAME, [], [
            [
                "name" => Img::NODE_NAME,
                "attributes" => [],
                "value" => "img-test"
            ],
            [
                "name" => Img::NODE_NAME,
                "attributes" => [],
                "value" => "img-test"
            ],
            [
                "name" => Img::NODE_NAME,
                "attributes" => [],
                "value" => "img-test"
            ],
        ]);
        $objects = new Objects($xml);

        foreach ($objects->img as $img) {
            $this->assertInstanceOf(Img::class, $img);
        }
    }

    public function test_document_is_instantiated_as_an_array_when_element_is_present(): void
    {
        $xml = $this->generateXml(Objects::NODE_NAME, [], [
            [
                "name" => Document::NODE_NAME,
                "attributes" => [],
                "value" => "document-test"
            ]
        ]);
        $objects = new Objects($xml);

        $this->assertIsArray($objects->document);
    }

    public function test_document_is_an_array_of_document_class_instances(): void
    {
        $xml = $this->generateXml(Objects::NODE_NAME, [], [
            [
                "name" => Document::NODE_NAME,
                "attributes" => [],
                "value" => "document-test"
            ],
            [
                "name" => Document::NODE_NAME,
                "attributes" => [],
                "value" => "document-test"
            ],
            [
                "name" => Document::NODE_NAME,
                "attributes" => [],
                "value" => "document-test"
            ],
        ]);
        $objects = new Objects($xml);

        foreach ($objects->document as $document) {
            $this->assertInstanceOf(Document::class, $document);
        }
    }
}
