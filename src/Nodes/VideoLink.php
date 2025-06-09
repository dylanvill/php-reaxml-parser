<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;

class VideoLink
{
    const NODE_NAME = "videoLink";

    public ?string $href;

    public function __construct(SimpleXMLElement $xml) {}
}
