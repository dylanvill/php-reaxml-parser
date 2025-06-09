<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Id
{
    const NODE_NAME = "id";

    use HasText;

    public function __construct(SimpleXMLElement $node) {
        $this->assignNodeToText($node);
    }
}
