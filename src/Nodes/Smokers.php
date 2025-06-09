<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Smokers
{
    const NODE_NAME = "smokers";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
