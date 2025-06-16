<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Pool;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class PoolTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation, GeneratesSampleXml;

    protected function nodeName(): string
    {
        return Pool::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Pool::class;
    }

    public function test_type_is_null_when_there_is_no_type_attribute(): void
    {
        $xml = $this->generateXml(Pool::NODE_NAME);
        $pool = new Pool($xml);

        $this->assertNull($pool->type);
    }

    public function test_type_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Pool::NODE_NAME, ["type" => "inground"]);
        $pool = new Pool($xml);

        $this->assertEquals("inground", $pool->type);
    }
}
