<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Fencing
{
    const NODE_NAME = "fencing";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
