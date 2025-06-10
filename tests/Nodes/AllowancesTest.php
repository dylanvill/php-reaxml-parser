<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Allowances;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;

class AllowancesTest extends TestCase
{
    use TestsNodeValidation;

    public function nodeClass(): string
    {
        return Allowances::class;
    }
}
