<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Enums\TaxEnum;
use App\ReaXml\Enums\YesNoEnum;
use App\ReaXml\Traits\HasText;
use App\ReaXml\Nodes\RentPerSquareMetre;
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
