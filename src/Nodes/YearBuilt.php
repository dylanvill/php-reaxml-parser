<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class YearBuilt
{
    const NODE_NAME = "yearBuilt";

    use HasNodeValidation;

    public ?string $value = null;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();

        $this->value = empty($attributes->value) ? null : $attributes->value->__toString();
    }
}
