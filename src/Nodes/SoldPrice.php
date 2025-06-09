<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasText;
use App\ReaXml\Nodes\Range;
use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class SoldPrice
{
    const NODE_NAME = "soldPrice";

    use HasText, HasNodeValidation;

    /** Expected values: "yes|no|range" */
    public ?string $display = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);
    }
}
