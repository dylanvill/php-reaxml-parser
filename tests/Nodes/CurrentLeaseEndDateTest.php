<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\CurrentLeaseEndDate;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class CurrentLeaseEndDateTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    protected function nodeName(): string
    {
        return CurrentLeaseEndDate::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return CurrentLeaseEndDate::class;
    }
}
