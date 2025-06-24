<?php

namespace AdGroup\ReaxmlParser\Contracts;

use AdGroup\ReaxmlParser\Enums\ListingStatusEnum;
use SimpleXMLElement;

abstract class ListingType
{

    protected array $additionalMappings = [];

    public ?string $modTime = null;
    public ?ListingStatusEnum $status = null;

    /**
     * Returns an array of key-value pair where the key is the name of the XML node and the
     * value is a closure function. Each element in the array mapping will be evaluated
     * and its closure function will be called with a single argument of type
     * `null|array` (an output of the `xpath()` SimpleXMLElement method).
     * 
     * The return array must use this structure:
     * ```
     * [
     *   "element-1" => fn (?array $node) => ... actions ...,
     *   "element-2" => fn (?array $node) => ... actions ...,
     * ]
     * ```
     */
    abstract protected function mapping(): array;

    /**
     * Registers an additional XML child node mapping for the class. 
     *
     * @param Array<string,Closure> $array Accepts an array that follows the
     * same format as the `mapping()` function.
     * @see AdGroup\ReaxmlParser\Contracts\ListingType::mapping()
     * @return self
     */
    public function addMapping(array $array): self
    {
        $key = array_key_first($array);
        $closure = $array[$key];
        $this->additionalMappings[$key] = $closure;

        return $this;
    }

    /**
     * Applies the mapping for the Listing class' child elements.
     *
     * @return self
     */
    public function map(SimpleXMLElement $node): self
    {
        $this->parseAttributes($node);
        $this->processMapping($node);

        return $this;
    }

    private function processMapping(SimpleXMLElement $node): void
    {
        $defaultMapping = $this->mapping();
        $mapping = array_merge($defaultMapping, $this->additionalMappings);

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }

    private function parseAttributes(SimpleXMLElement $node): void
    {
        $attributes = $node->attributes();
        $this->modTime = empty($attributes->modTime) ? null : $attributes->modTime->__toString();
        $this->status = empty($attributes->status) ? null : ListingStatusEnum::tryFrom($attributes->status->__toString());
    }
}
