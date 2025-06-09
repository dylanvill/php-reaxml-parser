<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class Document
{
    const NODE_NAME = "document";

    use HasText, HasNodeValidation;

    /** Expected values: 1 - 10 */
    public ?int $id = null;
    public ?string $modTime = null;
    public ?string $url = null;
    public ?string $file = null;
    public ?string $title = null;

    /** Expected value: "pdf" */
    public ?string $format = null;

    public function __construct(SimpleXMLElement $node)
    {

        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();

        $this->id = empty($attributes->id) ? null : $attributes->id->__toString();
        $this->modTime = empty($attributes->modTime) ? null : $attributes->modTime->__toString();
        $this->url = empty($attributes->url) ? null : $attributes->url->__toString();
        $this->file = empty($attributes->file) ? null : $attributes->file->__toString();
        $this->title = empty($attributes->title) ? null : $attributes->title->__toString();
        $this->format = empty($attributes->format) ? null : $attributes->format->__toString();
    }
}
