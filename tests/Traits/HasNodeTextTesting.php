<?php

namespace AdGroup\ReaxmlParser\Tests\Traits;

trait HasNodeTextTesting
{
    public function test_node_has_the_correct_value(): void
    {
        $instance = $this->getNodeClassInstance();
        $this->assertEquals($this->getExpectedText(), $instance->text);
    }
}
