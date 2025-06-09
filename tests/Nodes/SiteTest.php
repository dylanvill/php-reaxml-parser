<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Exceptions\IncorrectNodeArgument;
use AdGroup\ReaxmlParser\Nodes\Site;
use Orchestra\Testbench\TestCase;

class SiteTest extends TestCase
{
    public function test_text_from_node_is_correct(): void
    {
        $text = "sample site text";
        $xml = simplexml_load_string("<site>{$text}</site>");
        $instance = new Site($xml);

        $this->assertEquals($text, $instance->text);
    }

    public function test_text_is_null_when_node_does_not_have_any_text(): void
    {
        $xml = simplexml_load_string("<site></site>");
        $instance = new Site($xml);

        $this->assertNull($instance->text);
    }

    public function test_throws_error_when_node_received_is_incorrect(): void
    {
        $this->expectException(IncorrectNodeArgument::class);

        $xml = simplexml_load_string("<wrongNode></wrongNode>");
        new Site($xml);
    }
}
