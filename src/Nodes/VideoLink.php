<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class VideoLink
{
    const NODE_NAME = "videoLink";

    use HasText, HasNodeValidation;

    public ?string $href;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->href = empty($attributes->href) ? null : $attributes->href->__toString();
    }
}
