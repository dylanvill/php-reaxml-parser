<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;

class CommercialAuthority
{
    const NODE_NAME = "commercialAuthority";

    /** Expected values: "auction|tender|eoi|sale|forsale|offers" */
    public ?string $value = null;

    public function __construct(SimpleXMLElement $node) {}
}
