<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class Authority
{
    const NODE_NAME = "authority";

    /** Expected values: "auction|exclusive|multilist|conjunctional|open|sale|setsale" */
    public ?string $value;

    use HasNodeValidation;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->value = empty($attributes->value) ? null : $attributes->value->__toString();
    }
}
