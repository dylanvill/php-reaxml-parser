<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\PetFriendly;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class PetFriendlyTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    protected function nodeName(): string
    {
        return "petFriendly";
    }

    protected function nodeClass(): string
    {
        return PetFriendly::class;
    }
}
