<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class PropertyExtent
{
    const NODE_NAME = "propertyExtent";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
