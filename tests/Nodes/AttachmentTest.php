<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Attachment;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class AttachmentTest extends TestCase
{
    use TestsNodeValidation, TestsTextNode, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Attachment::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Attachment::class;
    }

    public function test_id_is_null_when_there_is_no_id_attribute(): void
    {
        $xml = $this->generateXml(Attachment::NODE_NAME);
        $attachment = new Attachment($xml);

        $this->assertNull($attachment->id);
    }

    public function test_id_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Attachment::NODE_NAME, ["id" => "id-value"]);
        $attachment = new Attachment($xml);

        $this->assertEquals("id-value", $attachment->id);
    }

    public function test_usage_is_null_when_there_is_no_usage_attribute(): void
    {
        $xml = $this->generateXml(Attachment::NODE_NAME);
        $attachment = new Attachment($xml);

        $this->assertNull($attachment->usage);
    }

    public function test_usage_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Attachment::NODE_NAME, ["usage" => "statementOfInformation"]);
        $attachment = new Attachment($xml);

        $this->assertEquals("statementOfInformation", $attachment->usage);
    }

    public function test_url_is_null_when_there_is_no_url_attribute(): void
    {
        $xml = $this->generateXml(Attachment::NODE_NAME);
        $attachment = new Attachment($xml);

        $this->assertNull($attachment->url);
    }

    public function test_url_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Attachment::NODE_NAME, ["url" => "test-url"]);
        $attachment = new Attachment($xml);

        $this->assertEquals("test-url", $attachment->url);
    }
}
