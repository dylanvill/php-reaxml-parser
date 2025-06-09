<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class ParkingComments
{
    const NODE_NAME = "parkingComments";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
