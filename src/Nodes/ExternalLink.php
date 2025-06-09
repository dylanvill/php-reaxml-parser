<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class ExternalLink
{
    const NODE_NAME = "externalLink";

    use HasNodeValidation;

    public ?string $href = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();

        $this->href = empty($attributes->href) ? null : $attributes->href->__toString();
    }
}
