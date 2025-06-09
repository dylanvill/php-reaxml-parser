<?php

namespace App\ReaXml\Nodes;

use App\ReaXml\Traits\HasNodeValidation;
use App\ReaXml\Traits\HasText;
use SimpleXMLElement;

class Floorplan
{
    const NODE_NAME = "floorplan";

    use HasText, HasNodeValidation;

    /** Expected values: 1 - 2 */
    public ?int $id = null;
    public ?string $modTime = null;
    public ?string $url = null;
    public ?string $file = null;

    /** Expected values: "jpg|gif" */
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
        $this->format = empty($attributes->format) ? null : $attributes->format->__toString();
    }
}
