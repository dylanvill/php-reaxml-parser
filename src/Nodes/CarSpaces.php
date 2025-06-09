<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class CarSpaces
{
    const NODE_NAME = "carSpaces";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
