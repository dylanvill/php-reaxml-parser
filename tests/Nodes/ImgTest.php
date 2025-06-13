<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Img;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class ImgTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Img::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Img::class;
    }

    public function test_id_is_null_when_there_is_no_id_attribute(): void
    {
        $xml = $this->generateXml(Img::NODE_NAME);
        $img = new Img($xml);

        $this->assertNull($img->id);
    }

    public function test_id_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Img::NODE_NAME, ["id" => "m"]);
        $img = new Img($xml);

        $this->assertEquals("m", $img->id);
    }

    public function test_mod_time_is_null_when_there_is_no_mod_time_attribute(): void
    {
        $xml = $this->generateXml(Img::NODE_NAME);
        $img = new Img($xml);

        $this->assertNull($img->modTime);
    }

    public function test_mod_time_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Img::NODE_NAME, ["modTime" => "mod-time-test"]);
        $img = new Img($xml);

        $this->assertEquals("mod-time-test", $img->modTime);
    }

    public function test_url_is_null_when_there_is_no_url_attribute(): void
    {
        $xml = $this->generateXml(Img::NODE_NAME);
        $img = new Img($xml);

        $this->assertNull($img->url);
    }

    public function test_url_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Img::NODE_NAME, ["url" => "url-test"]);
        $img = new Img($xml);

        $this->assertEquals("url-test", $img->url);
    }

    public function test_file_is_null_when_there_is_no_file_attribute(): void
    {
        $xml = $this->generateXml(Img::NODE_NAME);
        $img = new Img($xml);

        $this->assertNull($img->file);
    }

    public function test_file_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Img::NODE_NAME, ["file" => "file-test"]);
        $img = new Img($xml);

        $this->assertEquals("file-test", $img->file);
    }

    public function test_format_is_null_when_there_is_no_format_attribute(): void
    {
        $xml = $this->generateXml(Img::NODE_NAME);
        $img = new Img($xml);

        $this->assertNull($img->format);
    }

    public function test_format_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Img::NODE_NAME, ["format" => "format-test"]);
        $img = new Img($xml);

        $this->assertEquals("format-test", $img->format);
    }
}
