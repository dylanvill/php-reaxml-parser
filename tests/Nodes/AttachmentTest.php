<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Attachment;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use AdGroup\ReaxmlParser\Tests\Traits\TestsTextNode;
use Orchestra\Testbench\TestCase;

class AttachmentTest extends TestCase
{
    use TestsNodeValidation, TestsTextNode;

    protected function nodeName(): string
    {
        return "attachment";
    }

    protected function nodeClass(): string
    {
        return Attachment::class;
    }
}
