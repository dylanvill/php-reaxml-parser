<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;

class CommercialCategory
{
    const NODE_NAME = "commercialCategory";

    public ?int $id = 1;
    public ?string $name = "Retail";

    public function __construct(SimpleXMLElement $node) {}
}
