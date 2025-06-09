<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Enums\YesNoEnum;
use SimpleXMLElement;

class CommercialListingType
{
    const NODE_NAME = "commercialListingType";

    /** Expected values: "sale|lease|both" */
    public ?string $value;

    public function __construct(SimpleXMLElement $xml) {}
}
