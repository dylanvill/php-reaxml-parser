<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\AirConditioning;
use Orchestra\Testbench\TestCase;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;

class AirConditioningTest extends TestCase
{
    use TestsTextNode, TestsNodeValidation;

    public function nodeName(): string
    {
        return 'airConditioning';
    }

    public function nodeClass(): string
    {
        return AirConditioning::class;
    }
}
