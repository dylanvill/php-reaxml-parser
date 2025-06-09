<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use AdGroup\ReaxmlParser\Nodes\Range;
use SimpleXMLElement;

class RentPerSquareMetre
{
    const NODE_NAME = "rentPerSquareMetre";

    use HasText;

    public ?Range $range = null;

    public function __construct(SimpleXMLElement $node) {}
}
