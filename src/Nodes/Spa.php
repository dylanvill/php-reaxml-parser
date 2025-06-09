<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasNodeValidation;
use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Spa
{
    const NODE_NAME = "spa";

    use HasText, HasNodeValidation;

    /** Expected values: "inground|aboveground"" */
    public string $type = "inground";

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->type = $attributes->type->__toString();
    }
}
