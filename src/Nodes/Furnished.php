<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Furnished
{
    const NODE_NAME = "furnished";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
