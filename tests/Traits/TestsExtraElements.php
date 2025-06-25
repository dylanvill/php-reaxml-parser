<?php

namespace AdGroup\ReaxmlParser\Tests\Traits;

use SimpleXMLElement;

trait TestsExtraElements
{
    abstract protected function nodeName(): string;

    abstract protected function nodeClass(): string;

    public function test_parses_extra_elements_correctly(): void
    {
        $xml = simplexml_load_string("<{$this->nodeName()}><extraElement>test-extra-element</extraElement></{$this->nodeName()}>");
        $class = $this->nodeClass();
        $instance = new $class($xml);

        $this->assertArrayHasKey("extraElement", $instance->extraElements);
        $this->assertInstanceOf(SimpleXMLElement::class, $instance->extraElements["extraElement"][0]);
    }
}
