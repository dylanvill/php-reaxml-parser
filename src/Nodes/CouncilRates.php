<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class CouncilRates
{
    const NODE_NAME = "councilRates";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
