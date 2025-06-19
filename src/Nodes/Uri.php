<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Uri
{
    const NODE_NAME = "uri";

    use HasText, HasNodeValidation;

    /** Expected values: 1 - 3 */
    public ?int $id = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->id = empty($attributes->id) ? null : $attributes->id->__toString();
    }
}
