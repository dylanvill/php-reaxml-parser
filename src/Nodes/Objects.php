<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\Floorplan;
use AdGroup\ReaxmlParser\Nodes\Img;
use AdGroup\ReaxmlParser\Nodes\Document;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\ParsesExtraElements;
use SimpleXMLElement;

class Objects
{
    const NODE_NAME = "objects";

    use HasNodeValidation, ParsesExtraElements;

    /** @var Array<Floorplan> */
    public ?array $floorplan = null;

    /** @var Array<Img> */
    public ?array $img = null;

    /** @var Array<Document> */
    public ?array $document = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
        $this->parseExtraElements($node);
    }

    protected function expectedXmlElements(): array
    {
        return [Floorplan::NODE_NAME, Img::NODE_NAME, Document::NODE_NAME];
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            Floorplan::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->floorplan[] = new Floorplan($element);
                    }
                }
            },
            Img::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->img[] = new Img($element);
                    }
                }
            },
            Document::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->document[] = new Document($element);
                    }
                }
            },
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
