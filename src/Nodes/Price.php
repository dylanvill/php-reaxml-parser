<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Enums\YesNoEnum;
use App\ReaXml\Traits\HasText;
use App\ReaXml\Nodes\Range;
use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class Price
{
    const NODE_NAME = "price";

    use HasText, HasNodeValidation;

    /** Expected values: "yes|no" */
    public ?YesNoEnum $display = null;

    /** Expected values: "unknown|exempt|inclusive|exclusive" */
    public ?string $tax = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();

        $this->display = empty($attributes->display) ? null : YesNoEnum::parse($attributes->display->__toString());
        $this->tax = empty($attributes->tax) ? null : $attributes->tax->__toString();
    }
}
