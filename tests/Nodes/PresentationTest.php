<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Presentation;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class PresentationTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml;

    protected function nodeClass(): string
    {
        return Presentation::class;
    }

    public function test_presentation_has_no_text_attribute(): void
    {
        $xml = $this->generateXml(Presentation::NODE_NAME);
        $presentation = new Presentation($xml);

        $this->assertObjectNotHasProperty("text", $presentation);
    }

    public function test_style_is_null_when_there_is_no_style_attribute(): void
    {
        $xml = $this->generateXml(Presentation::NODE_NAME);
        $presentation = new Presentation($xml);

        $this->assertNull($presentation->style);
    }

    public function test_style_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Presentation::NODE_NAME, ["style" => "enhanced"]);
        $presentation = new Presentation($xml);

        $this->assertEquals("enhanced", $presentation->style);
    }

    public function test_duration_is_null_when_there_is_no_style_attribute(): void
    {
        $xml = $this->generateXml(Presentation::NODE_NAME);
        $presentation = new Presentation($xml);

        $this->assertNull($presentation->duration);
    }

    public function test_duration_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Presentation::NODE_NAME, ["duration" => "90"]);
        $presentation = new Presentation($xml);

        $this->assertEquals(90, $presentation->duration);
    }
}
