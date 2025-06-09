<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Order
{
    const NODE_NAME = "order";

    use HasText;

    public function __construct(SimpleXMLElement $node)
    {
        $this->assignNodeToText($node);
    }
}
