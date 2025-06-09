<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Stage
{
    const NODE_NAME = "stage";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
