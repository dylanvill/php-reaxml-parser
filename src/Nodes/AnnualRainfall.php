<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class AnnualRainfall
{
    const NODE_NAME = "annualRainFall";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
