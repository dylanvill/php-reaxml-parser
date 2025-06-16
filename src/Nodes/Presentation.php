<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class Presentation
{
    const NODE_NAME = "presentation";

    use HasNodeValidation;

    /** Expected values: "enhanced|premium|elite" */
    public ?string $style = null;
    /** Expected values: "30|90|180|365" */
    public ?int $duration = null;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->style = empty($attributes->style) ? null : $attributes->style->__toString();
        $this->duration = empty($attributes->duration) ? null : $attributes->duration->__toString();
    }
}
