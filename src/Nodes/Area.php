<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use AdGroup\ReaxmlParser\Nodes\Range;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class Area
{
    const NODE_NAME = "area";

    use HasText, HasNodeValidation;

    public ?Range $range;

    /** Expected result: "square|squareMeter|acre|hectare" */
    public ?string $unit = null;
    public ?string $of = null;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();

        $this->unit = empty($attributes->unit) ? null : $attributes->unit->__toString();
        $this->of = empty($attributes->of) ? null : $attributes->of->__toString();

        $range = $node->xpath(Range::NODE_NAME);

        if (!empty($range)) {
            $this->range = new Range($range[0]);
        }
    }
}
