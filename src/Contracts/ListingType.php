<?php

namespace AdGroup\ReaxmlParser\Contracts;

interface ListingType
{
    /**
     * Registers a custom XML child node mapping for the class
     *
     * @param Array<string,Closure> $array A key-value pair where the key is the name of the XML
     * node and the value is a closure that takes a single argument of type `null|array` (an
     * output of the `xpath()` SimpleXMLElement method) which will be called when the XML
     * node is found.

     * Example:
     * `["element-name" => fn (?array $node) => ... actions ...]`
     * @return self
     */
    public function addMapping(array $array): self;

    /**
     * Applies the mapping for the Listing class' child elements.
     *
     * @return self
     */
    public function map(): self;
}
