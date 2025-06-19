<?php

namespace AdGroup\ReaxmlParser\Contracts;

interface ListingType
{
    /**
     * Registers an XML child node mapping for the class. This function can also
     * be used to override existing mappings in case there are deviations of
     * the expected XML to be parsed from the standard REAXML format.
     *
     * @param Array<string,Closure> $array A key-value pair where the key is the name of the XML
     * node and the value is a closure that takes a single argument of type `null|array` which
     * will be called when the XML node is found.

     * Example:
     * `["element-name" => fn (?array $node) => ... actions ...]`
     * @return self
     */
    public function addMap(array $array): self;

    public function generate(): self;
}
