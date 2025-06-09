<?php

namespace AdGroup\ReaxmlParser\Traits;

use AdGroup\ReaxmlParser\Exceptions\IncorrectNodeArgument;
use SimpleXMLElement;

trait HasNodeValidation
{
    /**
     * Validates if the XML node being passed
     * is the expected node of the class.
     *
     * @param string $expectedNode
     * @param SimpleXMLElement $node
     * @throws IncorrectNodeArgument
     * @return void
     */
    private function validateNodeName(string $expectedNode, SimpleXMLElement $node): void
    {
        $name = $node->getName();

        if ($expectedNode !== $name) {
            throw new IncorrectNodeArgument();
        }
    }
}
