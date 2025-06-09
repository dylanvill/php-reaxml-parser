<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasNodeValidation;
use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Telephone
{
    const NODE_NAME = "telephone";

    use HasText, HasNodeValidation;

    /** Expected values: "AH|mobile" */
    public ?string $type = "mobile";

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();

        $this->type = empty($attributes->type) ? null : $attributes->type->__toString();
    }
}
