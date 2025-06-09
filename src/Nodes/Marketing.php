<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;

class Marketing
{
    const NODE_NAME = "marketing";

    public ?Upgrade $upgrade = null;

    public function __construct(SimpleXMLElement $node) {}
}
