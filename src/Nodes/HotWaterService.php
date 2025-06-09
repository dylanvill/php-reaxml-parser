<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasNodeValidation;
use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class HotWaterService
{
    const NODE_NAME = "hotWaterService";

    use HasText, HasNodeValidation;

    /** Expected values: "gas|electric|solar" */
    public ?string $type = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->type = empty($attributes->type) ? null : $attributes->type->__toString();
    }
}
