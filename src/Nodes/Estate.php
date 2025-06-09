<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\Name;
use AdGroup\ReaxmlParser\Nodes\Stage;
use SimpleXMLElement;

class Estate
{
    public ?Name $name = null;
    public ?Stage $stage = null;

    public function __construct(SimpleXMLElement $node) {}
}
