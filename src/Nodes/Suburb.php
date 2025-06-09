<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Enums\YesNoEnum;
use App\ReaXml\Traits\HasNodeValidation;
use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Suburb
{
    const NODE_NAME = "suburb";

    public YesNoEnum $display;

    use HasText, HasNodeValidation;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();

        $this->display = YesNoEnum::parse($attributes->display->__toString());
    }
}
