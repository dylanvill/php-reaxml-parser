<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Irrigation
{
    const NODE_NAME = "irrigation";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
