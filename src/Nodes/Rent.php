<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Rent
{
    const NODE_NAME = "rent";

    use HasText, HasNodeValidation;

    /** Expected values:  "week|month|weekly|monthly" */
    public ?string $period = null;
    public ?YesNoEnum $display = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->period = empty($attributes->period) ? null : $attributes->period->__toString();
        $this->display = empty($attributes->display) ? null : YesNoEnum::tryFrom($attributes->display->__toString());
    }
}
