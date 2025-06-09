<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Enums\YesNoEnum;
use App\ReaXml\Traits\HasNodeValidation;
use SimpleXMLElement;

class IsHomeLandPackage
{
    const NODE_NAME = "isHomeLandPackage";

    use HasNodeValidation;

    public YesNoEnum $value = YesNoEnum::NO;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();

        if (!empty($attributes->value)) {
            $this->value = YesNoEnum::parse(
                current((array) $attributes->value)
            );
        }
    }
}
