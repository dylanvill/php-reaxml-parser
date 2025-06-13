<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\StreetNumber;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class StreetNumberTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    protected function nodeName(): string
    {
        return StreetNumber::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return StreetNumber::class;
    }
}
