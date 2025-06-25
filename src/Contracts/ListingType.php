<?php

namespace AdGroup\ReaxmlParser\Contracts;

use AdGroup\ReaxmlParser\Enums\ListingStatusEnum;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

abstract class ListingType
{
    use ParsesExtraElements;

    /** Listing attributes */
    public ?string $modTime = null;
    public ?ListingStatusEnum $status = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->parseAttributes($node);
        $this->parseElements($node);
        $this->parseExtraElements($node);
    }

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

    private function parseElements(SimpleXMLElement $node): void
    {
        $mapping = $this->mapping();

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
