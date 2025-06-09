<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class CarryingCapacity
{
    const NODE_NAME = "carryingCapacity";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
