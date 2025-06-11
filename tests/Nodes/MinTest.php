<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Min;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class MinTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    protected function nodeName(): string
    {
        return "min";
    }

    protected function nodeClass(): string
    {
        return Min::class;
    }
}
