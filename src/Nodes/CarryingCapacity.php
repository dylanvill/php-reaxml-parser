<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class CarryingCapacity
{
    const NODE_NAME = "carryingCapacity";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
