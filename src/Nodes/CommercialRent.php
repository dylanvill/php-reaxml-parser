<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\TaxEnum;
use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Traits\HasText;
use AdGroup\ReaxmlParser\Nodes\RentPerSquareMetre;
use SimpleXMLElement;

class CommercialRent
{
    const NODE_NAME = "commercialRent";

    use HasText;

    public ?RentPerSquareMetre $rentPerSquareMetre;

    public ?string $period = null;
    public ?YesNoEnum $plusOutgoings = null;
    public ?TaxEnum $tax = null;

    public function __construct(SimpleXMLElement $xml) {}
}
