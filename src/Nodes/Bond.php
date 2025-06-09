<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Bond
{
    const NODE_NAME = "bond";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
