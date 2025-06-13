<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class LandCategory
{
    const NODE_NAME = "landCategory";

    use HasNodeValidation;

    /** Expected values: "Residential" - fixed */
    public ?string $name = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->name = empty($attributes->name) ? null : $attributes->name->__toString();
    }
}
