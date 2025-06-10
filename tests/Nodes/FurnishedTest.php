<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Furnished;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class FurnishedTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    public function nodeName(): string
    {
        return 'furnished';
    }

    public function nodeClass(): string
    {
        return Furnished::class;
    }
}
