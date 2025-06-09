<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Smokers
{
    const NODE_NAME = "smokers";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
