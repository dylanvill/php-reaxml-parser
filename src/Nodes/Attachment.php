<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Attachment
{
    const NODE_NAME = "attachment";

    use HasText, HasNodeValidation;

    public ?string $id = null;
    /** Expected values: "statementOfInformation|agentPhoto" */
    public ?string $usage = null;
    public ?string $url = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attributes = $node->attributes();
        $this->id = empty($attributes->id) ? null : $attributes->id->__toString();
        $this->usage = empty($attributes->usage) ? null : $attributes->usage->__toString();
        $this->url = empty($attributes->url) ? null : $attributes->url->__toString();
    }
}
