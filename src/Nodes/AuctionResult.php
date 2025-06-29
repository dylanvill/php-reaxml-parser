<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class AuctionResult
{
    const NODE_NAME = "auctionResult";

    use HasNodeValidation;

    /** Expected values: "sold-prior-to-auction|sold-at-auction|passed-in|passed-in-vendor-bid|withdrawn|sold-after-auction" */
    public ?string $type = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->type = empty($attributes->type) ? null : $attributes->type->__toString();
    }
}
