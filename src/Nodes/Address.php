<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Enums\YesNoEnum;
use AdGroup\ReaxmlParser\Nodes\Site;
use AdGroup\ReaxmlParser\Nodes\SubNumber;
use AdGroup\ReaxmlParser\Nodes\LotNumber;
use AdGroup\ReaxmlParser\Nodes\StreetNumber;
use AdGroup\ReaxmlParser\Nodes\Street;
use AdGroup\ReaxmlParser\Nodes\Suburb;
use AdGroup\ReaxmlParser\Nodes\State;
use AdGroup\ReaxmlParser\Nodes\Postcode;
use AdGroup\ReaxmlParser\Nodes\Region;
use AdGroup\ReaxmlParser\Nodes\Country;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class Address
{
    const NODE_NAME = "address";

    use HasNodeValidation;

    public ?YesNoEnum $display = null;
    public ?YesNoEnum $streetview = null;
    public ?string $unit = null;

    public ?Site $site = null;
    public ?SubNumber $subNumber = null;
    public ?LotNumber $lotNumber = null;
    public ?StreetNumber $streetNumber = null;
    public ?Street $street = null;
    public ?Suburb $suburb = null;
    public ?Postcode $postcode = null;
    public ?State $state = null;
    public ?Region $region = null;
    public ?Country $country = null;

    public function __construct(SimpleXMLElement $node) {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->mapNodes($node);

        $attributes = $node->attributes();

        $this->display = empty($attributes->display) ? null : YesNoEnum::parse($attributes->display->__toString());
        $this->streetview = empty($attributes->streetview) ? null : YesNoEnum::parse($attributes->streetview->__toString());
        $this->unit = empty($attributes->unit) ? null : $attributes->unit->__toString();
    }

    private function mapNodes(SimpleXMLElement $node): void {
        $mapping = [
            Site::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->site = new Site($node[0]),
            SubNumber::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->subNumber = new SubNumber($node[0]),
            LotNumber::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->lotNumber = new LotNumber($node[0]),
            StreetNumber::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->streetNumber = new StreetNumber($node[0]),
            Street::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->street = new Street($node[0]),
            Suburb::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->suburb = new Suburb($node[0]),
            Postcode::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->postcode = new Postcode($node[0]),
            State::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->state = new State($node[0]),
            Region::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->region = new Region($node[0]),
            Country::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->country = new Country($node[0]),
        ];

        foreach ($mapping as $key => $callback) {
            $callback($node->xpath($key));
        }
    }
}
