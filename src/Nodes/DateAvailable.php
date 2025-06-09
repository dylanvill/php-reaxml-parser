<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class DateAvailable
{
    const NODE_NAME = "dateAvailable";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
