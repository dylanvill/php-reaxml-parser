<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Services
{
    const NODE_NAME = "services";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
