<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class PropertyExtent
{
    const NODE_NAME = "propertyExtent";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
