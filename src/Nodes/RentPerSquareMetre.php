<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use AdGroup\ReaxmlParser\Nodes\Range;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class RentPerSquareMetre
{
    const NODE_NAME = "rentPerSquareMetre";

    use HasText, HasNodeValidation;

    public ?Range $range = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $rangeElement = $node->xpath(Range::NODE_NAME);

        if (!empty($rangeElement)) {
            $this->range = new Range($rangeElement[0]);
        }
    }
}
