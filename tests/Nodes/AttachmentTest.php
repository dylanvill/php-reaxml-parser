<?php

namespace AdGroup\ReaxmlParser\Tests\Nodes;

use AdGroup\ReaxmlParser\Nodes\Attachment;
use AdGroup\ReaxmlParser\Tests\Traits\TestsNodeValidation;
use Orchestra\Testbench\TestCase;

class AttachmentTest extends TestCase
{
    use TestsNodeValidation;

    protected function nodeClass(): string {
        return Attachment::class;
    }
}
