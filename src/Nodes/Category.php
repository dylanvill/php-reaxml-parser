<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class Category
{
    const NODE_NAME = "category";

    use HasNodeValidation;

    /** Expected Values: "House|Unit|Townhouse|Villa|Apartment|Flat|Studio|Warehouse|DuplexSemi-detached|Alpine|AcreageSemi-rural|Retirement|BlockOfUnits|Terrace|ServicedApartment|Other" */
    public ?string $name = null;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->name = empty($attributes->name) ? null : $attributes->name->__toString();
    }
}
