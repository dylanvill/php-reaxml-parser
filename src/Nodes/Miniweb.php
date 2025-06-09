<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;
use AdGroup\ReaxmlParser\Nodes\Uri;

class Miniweb
{
    const NODE_NAME = "miniweb";

    /** @var Array<Uri> */
    public ?array $uri = null;

    public function __construct(SimpleXMLElement $node) {}
}
