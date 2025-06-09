<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasNodeValidation;
use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Heating
{
    const NODE_NAME = "heating";

    use HasText, HasNodeValidation;

    /** Expected values: "gas|electric|GDH|solid|other" */
    public ?string $type = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->type = empty($attributes->type) ? null : $attributes->type->__toString();
    }
}
