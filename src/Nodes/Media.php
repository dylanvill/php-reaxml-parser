<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;
use AdGroup\ReaxmlParser\Nodes\Attachment;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;

class Media
{
    const NODE_NAME = "media";

    use HasNodeValidation;

    /** @var Array<Attachment> */
    public ?array $attachment = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);

        $attachments = $node->xpath(Attachment::NODE_NAME);

        if (!empty($attachments)) {
            foreach ($attachments as $element) {
                if (!empty($element)) {
                    $this->attachment[] = new Attachment($element);
                }
            }
        }
    }
}
