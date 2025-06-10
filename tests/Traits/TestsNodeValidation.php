<?php

namespace AdGroup\ReaxmlParser\Tests\Traits;

use AdGroup\ReaxmlParser\Exceptions\IncorrectNodeArgument;

/**
 * A trait that can be used for testing to confirm that a node class
 * validates the XML they received in their constructor.
 */
trait TestsNodeValidation
{
    abstract protected function nodeClass(): string;

    public function test_throws_error_when_node_received_is_incorrect(): void
    {
        $this->expectException(IncorrectNodeArgument::class);
        $class = $this->nodeClass();
        $xml = simplexml_load_string("<wrongNode></wrongNode>");
        new $class($xml);
    }
}
