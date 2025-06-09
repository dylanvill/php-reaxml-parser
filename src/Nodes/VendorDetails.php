<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;
use AdGroup\ReaxmlParser\Nodes\Name;
use AdGroup\ReaxmlParser\Nodes\Telephone;
use AdGroup\ReaxmlParser\Nodes\Email;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;

class VendorDetails
{
    const NODE_NAME = "vendorDetails";

    use HasNodeValidation;

    public ?Name $name = null;
    public ?Telephone $telephone = null;
    public ?Email $email = null;

    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);
    }

    private function mapNodes(SimpleXMLElement $node): void
    {
        $mapping = [
            Name::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->name = new Name($node[0]),
            Telephone::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->telephone = new Telephone($node[0]),
            Email::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->email = new Email($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
