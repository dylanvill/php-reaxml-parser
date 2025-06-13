<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\LrgFamilies;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class LrgFamiliesTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    protected function nodeName(): string
    {
        return LrgFamilies::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return LrgFamilies::class;
    }
}
