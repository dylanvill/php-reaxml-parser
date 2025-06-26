<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Miniweb;
use AdGroup\ReaxmlParser\Nodes\Uri;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class MiniwebTest extends TestCase
{
    use TestsNodeValidation, GeneratesSampleXml, TestsExtraElements;

    protected function nodeName(): string
    {
        return Miniweb::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Miniweb::class;
    }

    public function test_uri_is_null_when_there_is_no_uri_element(): void
    {
        $xml = $this->generateXml(Miniweb::NODE_NAME);
        $miniweb = new Miniweb($xml);

        $this->assertNull($miniweb->uri);
    }

    public function test_uri_is_an_array_even_if_only_one_uri_is_present(): void
    {
        $xml = $this->generateXml(Miniweb::NODE_NAME, [], [
            [
                "name" => Uri::NODE_NAME,
                "value" => "uri-test",
                "attributes" => []
            ]
        ]);
        $miniweb = new Miniweb($xml);

        $this->assertIsArray($miniweb->uri);
    }

    public function test_uri_is_instantiated_as_an_array_of_uri_classes(): void
    {
        $xml = $this->generateXml(Miniweb::NODE_NAME, [], [
            [
                "name" => Uri::NODE_NAME,
                "value" => "uri-test",
                "attributes" => []
            ]
        ]);
        $miniweb = new Miniweb($xml);

        foreach ($miniweb->uri as $uri) {
            $this->assertInstanceOf(Uri::class, $uri);
        }
    }
}
