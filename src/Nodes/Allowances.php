<?php 

namespace App\ReaXml\Nodes;

use App\ReaXml\Nodes\PetFriendly;
use App\ReaXml\Nodes\Furnished;
use App\ReaXml\Nodes\Smokers;
use SimpleXMLElement;

class Allowances {
    const NODE_NAME = "allowances";

    public ?PetFriendly $petFriendly;
    public ?Furnished $furnished;
    public ?Smokers $smokers;
    
    public function __construct(SimpleXMLElement $node) {}
}