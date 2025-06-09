<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Id
{
    const NODE_NAME = "id";

    use HasText;

    public function __construct(SimpleXMLElement $node) {
        $this->assignNodeToText($node);
    }
}
