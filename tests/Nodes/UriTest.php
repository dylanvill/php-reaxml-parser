<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Upgrade;
use AdGroup\ReaxmlParser\Nodes\Uri;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class UriTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Uri::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Uri::class;
    }

    public function test_id_is_null_when_id_attribute_is_missing(): void
    {
        $xml = $this->generateXml(Uri::NODE_NAME);
        $uri = new Uri($xml);

        $this->assertNull($uri->id);
    }

    public function test_id_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Uri::NODE_NAME, ["id" => "1"]);
        $uri = new Uri($xml);

        $this->assertEquals(1, $uri->id);
    }
}
