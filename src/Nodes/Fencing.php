<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Fencing
{
    const NODE_NAME = "fencing";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
