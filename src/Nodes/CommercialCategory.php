<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class CommercialCategory
{
    const NODE_NAME = "commercialCategory";

    use HasNodeValidation;

    public ?int $id = null;
    public ?string $name = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->id = empty($attributes->id) ? null : $attributes->id->__toString();
        $this->name = empty($attributes->name) ? null : $attributes->name->__toString();
    }
}
