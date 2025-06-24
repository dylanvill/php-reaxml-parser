<?php

namespace AdGroup\ReaxmlParser\ListingTypes;

use AdGroup\ReaxmlParser\Contracts\ListingType;
use AdGroup\ReaxmlParser\Nodes\AgentId;
use AdGroup\ReaxmlParser\Nodes\UniqueId;
use AdGroup\ReaxmlParser\Nodes\Marketing;
use AdGroup\ReaxmlParser\Nodes\CommercialAuthority;
use AdGroup\ReaxmlParser\Nodes\Exclusivity;
use AdGroup\ReaxmlParser\Nodes\CommercialListingType;
use AdGroup\ReaxmlParser\Nodes\UnderOffer;
use AdGroup\ReaxmlParser\Nodes\ListingAgent;
use AdGroup\ReaxmlParser\Nodes\Price;
use AdGroup\ReaxmlParser\Nodes\PriceView;
use AdGroup\ReaxmlParser\Nodes\CommercialRent;
use AdGroup\ReaxmlParser\Nodes\Outgoings;
use AdGroup\ReaxmlParser\Nodes\ReturnNode;
use AdGroup\ReaxmlParser\Nodes\CurrentLeaseEndDate;
use AdGroup\ReaxmlParser\Nodes\Tenancy;
use AdGroup\ReaxmlParser\Nodes\FurtherOptions;
use AdGroup\ReaxmlParser\Nodes\IsMultiple;
use AdGroup\ReaxmlParser\Nodes\Address;
use AdGroup\ReaxmlParser\Nodes\Municipality;
use AdGroup\ReaxmlParser\Nodes\StreetDirectory;
use AdGroup\ReaxmlParser\Nodes\CommercialCategory;
use AdGroup\ReaxmlParser\Nodes\Headline;
use AdGroup\ReaxmlParser\Nodes\Description;
use AdGroup\ReaxmlParser\Nodes\Highlight;
use AdGroup\ReaxmlParser\Nodes\SoldDetails;
use AdGroup\ReaxmlParser\Nodes\LandDetails;
use AdGroup\ReaxmlParser\Nodes\BuildingDetails;
use AdGroup\ReaxmlParser\Nodes\PropertyExtent;
use AdGroup\ReaxmlParser\Nodes\CarSpaces;
use AdGroup\ReaxmlParser\Nodes\ParkingComments;
use AdGroup\ReaxmlParser\Nodes\Auction;
use AdGroup\ReaxmlParser\Nodes\AuctionOutcome;
use AdGroup\ReaxmlParser\Nodes\VendorDetails;
use AdGroup\ReaxmlParser\Nodes\YearBuilt;
use AdGroup\ReaxmlParser\Nodes\YearLastRenovated;
use AdGroup\ReaxmlParser\Nodes\Zone;
use AdGroup\ReaxmlParser\Nodes\ExternalLink;
use AdGroup\ReaxmlParser\Nodes\VideoLink;
use AdGroup\ReaxmlParser\Nodes\ExtraFields;
use AdGroup\ReaxmlParser\Nodes\Images;
use AdGroup\ReaxmlParser\Nodes\Objects;
use AdGroup\ReaxmlParser\Nodes\Miniweb;
use AdGroup\ReaxmlParser\Nodes\PurchaseOrder;

#[\AllowDynamicProperties]
class Commercial extends ListingType
{
    const NODE_NAME = "commercial";

    public ?AgentId $agentId = null;
    public ?UniqueId $uniqueId = null;
    public ?Marketing $marketing = null;
    public ?CommercialAuthority $commercialAuthority = null;
    public ?Exclusivity $exclusivity = null;
    public ?CommercialListingType $commercialListingType = null;
    public ?UnderOffer $underOffer = null;
    public ?array $listingAgent = null;
    public ?Price $price = null;
    public ?PriceView $priceView = null;
    public ?CommercialRent $commercialRent = null;
    public ?Outgoings $outgoings = null;
    public ?ReturnNode $return = null;
    public ?CurrentLeaseEndDate $currentLeaseEndDate = null;
    public ?Tenancy $tenancy = null;
    public ?FurtherOptions $furtherOptions = null;
    public ?IsMultiple $isMultiple = null;
    public ?Address $address = null;
    public ?Municipality $municipality = null;
    public ?StreetDirectory $streetDirectory = null;
    public ?array $commercialCategory = null;
    public ?Headline $headline = null;
    public ?Description $description = null;
    public ?array $highlight = null;
    public ?SoldDetails $soldDetails = null;
    public ?LandDetails $landDetails = null;
    public ?BuildingDetails $buildingDetails = null;
    public ?PropertyExtent $propertyExtent = null;
    public ?CarSpaces $carSpaces = null;
    public ?ParkingComments $parkingComments = null;
    public ?Auction $auction = null;
    public ?AuctionOutcome $auctionOutcome = null;
    public ?array $vendorDetails = null;
    public ?YearBuilt $yearBuilt = null;
    public ?YearLastRenovated $yearLastRenovated = null;
    public ?Zone $zone = null;
    public ?array $externalLink = null;
    public ?VideoLink $videoLink = null;
    public ?ExtraFields $extraFields = null;
    public ?Images $images = null;
    public ?Objects $objects = null;
    public ?Miniweb $miniweb = null;
    public ?PurchaseOrder $purchaseOrder = null;

    public function __construct() {}

    protected function mapping(): array
    {
        return [
            AgentId::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->agentId = new AgentId($node[0]),
            UniqueId::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->uniqueId = new UniqueId($node[0]),
            Marketing::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->marketing = new Marketing($node[0]),
            CommercialAuthority::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->commercialAuthority = new CommercialAuthority($node[0]),
            Exclusivity::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->exclusivity = new Exclusivity($node[0]),
            CommercialListingType::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->commercialListingType = new CommercialListingType($node[0]),
            UnderOffer::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->underOffer = new UnderOffer($node[0]),
            ListingAgent::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->listingAgent[] = new ListingAgent($element);
                    }
                }
            },
            Price::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->price = new Price($node[0]),
            PriceView::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->priceView = new PriceView($node[0]),
            CommercialRent::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->commercialRent = new CommercialRent($node[0]),
            Outgoings::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->outgoings = new Outgoings($node[0]),
            ReturnNode::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->return = new ReturnNode($node[0]),
            CurrentLeaseEndDate::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->currentLeaseEndDate = new CurrentLeaseEndDate($node[0]),
            Tenancy::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->tenancy = new Tenancy($node[0]),
            FurtherOptions::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->furtherOptions = new FurtherOptions($node[0]),
            IsMultiple::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->isMultiple = new IsMultiple($node[0]),
            Address::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->address = new Address($node[0]),
            Municipality::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->municipality = new Municipality($node[0]),
            StreetDirectory::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->streetDirectory = new StreetDirectory($node[0]),
            CommercialCategory::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->commercialCategory[] = new CommercialCategory($element);
                    }
                }
            },
            Headline::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->headline = new Headline($node[0]),
            Description::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->description = new Description($node[0]),
            Highlight::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->highlight[] = new Highlight($element);
                    }
                }
            },
            SoldDetails::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->soldDetails = new SoldDetails($node[0]),
            LandDetails::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->landDetails = new LandDetails($node[0]),
            BuildingDetails::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->buildingDetails = new BuildingDetails($node[0]),
            PropertyExtent::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->propertyExtent = new PropertyExtent($node[0]),
            CarSpaces::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->carSpaces = new CarSpaces($node[0]),
            ParkingComments::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->parkingComments = new ParkingComments($node[0]),
            Auction::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->auction = new Auction($node[0]),
            AuctionOutcome::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->auctionOutcome = new AuctionOutcome($node[0]),
            VendorDetails::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->vendorDetails[] = new VendorDetails($element);
                    }
                }
            },
            YearBuilt::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->yearBuilt = new YearBuilt($node[0]),
            YearLastRenovated::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->yearLastRenovated = new YearLastRenovated($node[0]),
            Zone::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->zone = new Zone($node[0]),
            ExternalLink::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->externalLink[] = new ExternalLink($element);
                    }
                }
            },
            VideoLink::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->videoLink = new VideoLink($node[0]),
            ExtraFields::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->extraFields = new ExtraFields($node[0]),
            Images::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->images = new Images($node[0]),
            Objects::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->objects = new Objects($node[0]),
            Miniweb::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->miniweb = new Miniweb($node[0]),
            PurchaseOrder::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->purchaseOrder = new PurchaseOrder($node[0]),
        ];
    }
}
