<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class CurrentLeaseEndDate
{
    const NODE_NAME = "currentLeaseEndDate";

    use HasText;

    public function __construct(SimpleXMLElement $xml) {}
}
