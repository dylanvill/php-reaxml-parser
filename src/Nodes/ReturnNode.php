<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;

class ReturnNode
{
    const NODE_NAME = "return";

    use HasText;

    /** Expected value:  "annual" - fixed */
    public ?string $period = null;
    /** Expected value:  "percent" - fixed */
    public ?string $unit = null;
}
