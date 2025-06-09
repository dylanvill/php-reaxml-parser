<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use SimpleXMLElement;

class CommercialListingType
{
    const NODE_NAME = "commercialListingType";

    /** Expected values: "sale|lease|both" */
    public ?string $value;

    public function __construct(SimpleXMLElement $xml) {}
}
