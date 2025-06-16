<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class RuralCategory
{
    const NODE_NAME = "ruralCategory";

    use HasNodeValidation;

    /** Expected values: "Cropping|Dairy|Farmlet|Horticulture|Livestock|Viticulture|MixedFarming|Lifestyle|Other" */
    public ?string $name = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->name = empty($attributes->name) ? null : $attributes->name->__toString();
    }
}
