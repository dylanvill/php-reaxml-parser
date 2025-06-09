<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Improvements
{
    const NODE_NAME = "improvements";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
