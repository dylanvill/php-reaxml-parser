<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Date;
use AdGroup\ReaxmlParser\Nodes\DateAvailable;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class DateAvailableTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    protected function nodeName(): string
    {
        return DateAvailable::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return DateAvailable::class;
    }
}
