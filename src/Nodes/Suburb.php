<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Suburb
{
    const NODE_NAME = "suburb";

    public ?YesNoEnum $display = null;

    use HasText, HasNodeValidation;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();

        $this->display = empty($attributes->display) ? null : YesNoEnum::parse($attributes->display->__toString());
    }
}
