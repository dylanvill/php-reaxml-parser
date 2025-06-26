<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\TaxEnum;
use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Traits\HasText;
use AdGroup\ReaxmlParser\Nodes\Range;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class Price
{
    const NODE_NAME = "price";

    use HasText, HasNodeValidation, ParsesExtraElements;

    public ?Range $range = null;

    public ?YesNoEnum $display = null;
    public ?TaxEnum $tax = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);
        $this->parseRange($node);
        $this->parseExtraElements($node);

        $attributes = $node->attributes();

        $this->display = empty($attributes->display) ? null : YesNoEnum::parse($attributes->display->__toString());
        $this->tax = empty($attributes->tax) ? null : TaxEnum::tryFrom($attributes->tax->__toString());
    }

    protected function expectedXmlElements(): array
    {
        return [Range::NODE_NAME];
    }

    private function parseRange(SimpleXMLElement $node): void
    {
        $range = $node->xpath("range");

        if (!empty($range)) {
            $this->range = new Range($range[0]);
        }
    }
}
