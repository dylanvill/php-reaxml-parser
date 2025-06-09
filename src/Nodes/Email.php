<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Email
{
    const NODE_NAME = "email";

    use HasText, HasNodeValidation;

    public ?YesNoEnum $receiveCampaignReport = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();

        if (!empty($attributes->receiveCampaignReport)) {
            $this->receiveCampaignReport = YesNoEnum::parse($attributes->type->__toString());
        }
    }
}
