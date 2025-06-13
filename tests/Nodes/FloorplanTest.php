<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Floorplan;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class FloorplanTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Floorplan::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Floorplan::class;
    }

    public function test_id_is_null_when_there_is_no_id_attribute(): void
    {
        $xml = $this->generateXml(Floorplan::NODE_NAME);
        $floorplan = new Floorplan($xml);

        $this->assertNull($floorplan->id);
    }

    public function test_id_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Floorplan::NODE_NAME, ["id" => "1"]);
        $floorplan = new Floorplan($xml);

        $this->assertEquals(1, $floorplan->id);
    }

    public function test_mod_time_is_null_when_there_is_no_mod_time_attribute(): void
    {
        $xml = $this->generateXml(Floorplan::NODE_NAME);
        $floorplan = new Floorplan($xml);

        $this->assertNull($floorplan->modTime);
    }

    public function test_mod_time_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Floorplan::NODE_NAME, ["modTime" => "mod-time-test"]);
        $floorplan = new Floorplan($xml);

        $this->assertEquals("mod-time-test", $floorplan->modTime);
    }

    public function test_url_is_null_when_there_is_no_url_attribute(): void
    {
        $xml = $this->generateXml(Floorplan::NODE_NAME);
        $floorplan = new Floorplan($xml);

        $this->assertNull($floorplan->url);
    }

    public function test_url_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Floorplan::NODE_NAME, ["url" => "url-test"]);
        $floorplan = new Floorplan($xml);

        $this->assertEquals("url-test", $floorplan->url);
    }

    public function test_file_is_null_when_there_is_no_file_attribute(): void
    {
        $xml = $this->generateXml(Floorplan::NODE_NAME);
        $floorplan = new Floorplan($xml);

        $this->assertNull($floorplan->file);
    }

    public function test_file_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Floorplan::NODE_NAME, ["file" => "file-test"]);
        $floorplan = new Floorplan($xml);

        $this->assertEquals("file-test", $floorplan->file);
    }

    public function test_format_is_null_when_there_is_no_format_attribute(): void
    {
        $xml = $this->generateXml(Floorplan::NODE_NAME);
        $floorplan = new Floorplan($xml);

        $this->assertNull($floorplan->format);
    }

    public function test_format_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Floorplan::NODE_NAME, ["format" => "format-test"]);
        $floorplan = new Floorplan($xml);

        $this->assertEquals("format-test", $floorplan->format);
    }
}
