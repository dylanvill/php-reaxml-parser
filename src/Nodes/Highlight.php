<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Highlight
{
    const NODE_NAME = "highlight";

    use HasText;

    /** Expected values: 1 - 3 */
    public ?int $id = null;

    public function __construct(SimpleXMLElement $node) {}
}
