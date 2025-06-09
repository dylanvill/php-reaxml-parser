<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Tenancy
{
    const NODE_NAME = "tenancy";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
 