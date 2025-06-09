<?php 

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Nodes\PetFriendly;
use AdGroup\ReaxmlParser\Nodes\Furnished;
use AdGroup\ReaxmlParser\Nodes\Smokers;
use SimpleXMLElement;

class Allowances {
    const NODE_NAME = "allowances";

    public ?PetFriendly $petFriendly;
    public ?Furnished $furnished;
    public ?Smokers $smokers;
    
    public function __construct(SimpleXMLElement $node) {}
}