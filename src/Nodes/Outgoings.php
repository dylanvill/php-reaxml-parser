<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Outgoings
{
    const NODE_NAME = "outgoings";

    use HasText;

    /** Expected value: "annual" */
    public ?string $period = null;

    public function __construct(SimpleXMLElement $node) {}
}
