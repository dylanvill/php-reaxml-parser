<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Uri
{
    const NODE_NAME = "uri";

    use HasText;

    /** Expected values: 1 - 3 */
    public ?int $id = null;

    public function __construct(SimpleXMLElement $node) {}
}
