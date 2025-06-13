<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Highlight;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class HighlightTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Highlight::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Highlight::class;
    }

    public function test_id_is_null_when_there_is_no_id_attribute(): void
    {
        $xml = $this->generateXml(Highlight::NODE_NAME);
        $highlight = new Highlight($xml);

        $this->assertNull($highlight->id);
    }

    public function test_id_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Highlight::NODE_NAME, ["id" => 1]);
        $highlight = new Highlight($xml);

        $this->assertEquals(1, $highlight->id);
    }
}
