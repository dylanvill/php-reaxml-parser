<?php

namespace AdGroup\ReaxmlParser\Tests\Traits;

/**
 * A trait that can be used for testing XML nodes that contain text.
 */
trait TestsTextNode
{
    abstract protected function nodeName(): string;
    abstract protected function nodeClass(): string;

    public function test_text_from_node_is_correct(): void
    {
        $text = "1";
        $xml = simplexml_load_string("<{$this->nodeName()}>{$text}</{$this->nodeName()}>");
        $class = $this->nodeClass();
        $instance = new $class($xml);

        $this->assertEquals($text, $instance->text);
    }

    public function test_text_is_null_when_node_does_not_have_any_text(): void
    {
        $xml = simplexml_load_string("<{$this->nodeName()}></{$this->nodeName()}>");
        $class = $this->nodeClass();
        $instance = new $class($xml);

        $this->assertNull($instance->text);
    }
}
