<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Document;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class DocumentTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Document::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Document::class;
    }

    public function test_properties_are_null_when_there_are_no_xml_attributes(): void
    {
        $xml = $this->generateXml(Document::NODE_NAME);
        $document = new Document($xml);

        $this->assertNull($document->id);
        $this->assertNull($document->modTime);
        $this->assertNull($document->url);
        $this->assertNull($document->file);
        $this->assertNull($document->title);
        $this->assertNull($document->format);
    }

    public function test_properties_has_the_correct_values(): void
    {
        $attributeMap = [
            "id" => "1",
            "modTime" => "mod-time-test",
            "url" => "url-test",
            "file" => "file-test",
            "title" => "title-test",
            "format" => "format-test",
        ];

        $xml = $this->generateXml(Document::NODE_NAME, $attributeMap);
        $document = new Document($xml);

        foreach ($attributeMap as $key => $value) {
            $this->assertEquals($document->{$key}, $value);
        }
    }
}
