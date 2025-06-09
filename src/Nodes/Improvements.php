<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Improvements
{
    const NODE_NAME = "improvements";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
