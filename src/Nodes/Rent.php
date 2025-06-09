<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Enums\YesNoEnum;
use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Rent
{
    const NODE_NAME = "rent";

    use HasText;

    /** Expected values:  "week|month|weekly|monthly" */
    public ?string $period = null;
    public ?YesNoEnum $display = null;

    public function __construct(SimpleXMLElement $node) {}
}
