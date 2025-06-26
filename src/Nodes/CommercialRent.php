<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\TaxEnum;
use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Traits\HasText;
use AdGroup\ReaxmlParser\Nodes\RentPerSquareMetre;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class CommercialRent
{
    const NODE_NAME = "commercialRent";

    use HasText, HasNodeValidation, ParsesExtraElements;

    public ?RentPerSquareMetre $rentPerSquareMetre = null;

    public ?string $period = null;
    public ?YesNoEnum $plusOutgoings = null;
    public ?TaxEnum $tax = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);
        $this->parseExtraElements($node);

        $element = $node->xpath(RentPerSquareMetre::NODE_NAME);
        if (!empty($element)) {
            $this->rentPerSquareMetre = new RentPerSquareMetre($element[0]);
        }

        $attributes = $node->attributes();
        $this->period = empty($attributes->period) ? null : $attributes->period->__toString();
        $this->plusOutgoings = empty($attributes->plusOutgoings) ? null : YesNoEnum::parse($attributes->plusOutgoings->__toString());
        $this->tax = empty($attributes->tax) ? null : TaxEnum::tryFrom($attributes->tax->__toString());
    }

    protected function expectedXmlElements(): array
    {
        return [RentPerSquareMetre::NODE_NAME];
    }
}
