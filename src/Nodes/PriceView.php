<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasNodeValidation;
use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class PriceView
{
    const NODE_NAME = "priceView";

    use HasText, HasNodeValidation;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);
    }
}
