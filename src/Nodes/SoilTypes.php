<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class SoilTypes
{
    const NODE_NAME = "soilTypes";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
