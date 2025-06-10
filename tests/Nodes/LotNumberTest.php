<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\LotNumber;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class LotNumberTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    public function nodeName(): string
    {
        return 'lotNumber';
    }

    public function nodeClass(): string
    {
        return LotNumber::class;
    }
}
