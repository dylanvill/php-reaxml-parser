<?php

namespace AdGroup\ReaxmlParser\Traits;

use SimpleXMLElement;

/**
 * Indicates that a node contains a value within it's own inner element, e.g.:
 * <element>lorem ipsum</element>
 * 
 * This is equivalent #PCDATA and CDATA in the offical REAXML DTD.
 */
trait HasText
{
    public ?string $text = null;

    public function assignNodeToText(SimpleXMLElement $node): void
    {
        $text = $node->__toString();
        $this->text = empty($text) ? null : $text;
    }
}
