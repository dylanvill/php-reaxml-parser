<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
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
