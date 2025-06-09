<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class PetFriendly
{
    const NODE_NAME = "petFriendly";

    use HasText;

    public function __construct(SimpleXMLElement $node) {}
}
