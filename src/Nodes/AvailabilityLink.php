<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class AvailabilityLink
{
    const NODE_NAME = "availabilityLink";

    use HasNodeValidation;

    public ?string $href;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->href = empty($attributes->href) ? null : $attributes->href->__toString();
    }
}
