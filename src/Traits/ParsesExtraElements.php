<?php

namespace AdGroup\ReaxmlParser\Traits;

use SimpleXMLElement;

/**
 * This trait is used to assist in parsing extra elements
 * that aren't expected in the XML child elements.
 */
trait ParsesExtraElements
{
    public array $extraElements = [];

    /**
     * Returns a one-dimensional array of the expected XML child elements.
     *
     * @return Array<string>
     */
    abstract protected function expectedXmlElements(): array;

    /**
     * This function reads the given XML node and places any extra
     * element into the `extraElements` property.
     *
     * @param SimpleXMLElement $node
     * @return void
     */
    protected function parseExtraElements(SimpleXMLElement $node): void
    {
        $mappedElements = $this->expectedXmlElements();

        foreach ($node->children() as $childNode) {
            if (!in_array($childNode->getName(), $mappedElements)) {
                $this->extraElements[$childNode->getName()] = $childNode;
            }
        }
    }
}
