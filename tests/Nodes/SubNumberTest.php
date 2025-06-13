<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\SubNumber;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class SubNumberTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    protected function nodeName(): string
    {
        return SubNumber::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return SubNumber::class;
    }
}
