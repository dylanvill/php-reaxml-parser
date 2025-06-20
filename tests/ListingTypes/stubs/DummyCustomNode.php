<?php

namespace AdGroup\ReaxmlParser\Tests\ListingTypes\Stubs;

use SimpleXMLElement;

class DummyCustomNode
{

    const NODE_NAME = "dummyCustomNode";

    public function __construct(SimpleXMLElement $node) {
        $test = "node";
    }
}
