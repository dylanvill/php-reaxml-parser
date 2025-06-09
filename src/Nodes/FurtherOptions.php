<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class FurtherOptions
{
    const NODE_NAME = "furtherOptions";

    use HasText;

    public function __construct(SimpleXMLElement $xml) {}
}
