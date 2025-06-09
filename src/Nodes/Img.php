<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Img
{
    const NODE_NAME = "img";

    use HasText, HasNodeValidation;

    /** Expected values: "m|a|b|c|d|e|f|g|h|i|j|k|l|n|o|p|q|r|s|t|u|v|w|x|y|z|aa|ab|ac|ad|ae|af|ag|ah|ai" */
    public ?string $id = null;

    public ?string $modTime = null;
    public ?string $url = null;
    public ?string $file = null;

    /** Expected value: "jpg" */
    public ?string $format = null;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();

        $this->id = empty($attributes->id) ? null : $attributes->id->__toString();
        $this->modTime = empty($attributes->modTime) ? null : $attributes->modTime->__toString();
        $this->url = empty($attributes->url) ? null : $attributes->url->__toString();
        $this->file = empty($attributes->file) ? null : $attributes->file->__toString();
        $this->format = empty($attributes->format) ? null : $attributes->format->__toString();
    }  
}
