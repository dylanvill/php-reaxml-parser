<?php

namespace AdGroup\ReaxmlParser\ListingTypes;

use AdGroup\ReaxmlParser\Contracts\ListingType;
use AdGroup\ReaxmlParser\Nodes\AgentId;
use AdGroup\ReaxmlParser\Nodes\UniqueId;
use AdGroup\ReaxmlParser\Nodes\Authority;
use AdGroup\ReaxmlParser\Nodes\UnderOffer;
use AdGroup\ReaxmlParser\Nodes\ListingAgent;
use AdGroup\ReaxmlParser\Nodes\Price;
use AdGroup\ReaxmlParser\Nodes\PriceView;
use AdGroup\ReaxmlParser\Nodes\Address;
use AdGroup\ReaxmlParser\Nodes\Municipality;
use AdGroup\ReaxmlParser\Nodes\Estate;
use AdGroup\ReaxmlParser\Nodes\StreetDirectory;
use AdGroup\ReaxmlParser\Nodes\LandCategory;
use AdGroup\ReaxmlParser\Nodes\Headline;
use AdGroup\ReaxmlParser\Nodes\Description;
use AdGroup\ReaxmlParser\Nodes\Features;
use AdGroup\ReaxmlParser\Nodes\SoldDetails;
use AdGroup\ReaxmlParser\Nodes\LandDetails;
use AdGroup\ReaxmlParser\Nodes\InspectionTimes;
use AdGroup\ReaxmlParser\Nodes\Auction;
use AdGroup\ReaxmlParser\Nodes\AuctionOutcome;
use AdGroup\ReaxmlParser\Nodes\VendorDetails;
use AdGroup\ReaxmlParser\Nodes\YearBuilt;
use AdGroup\ReaxmlParser\Nodes\YearLastRenovated;
use AdGroup\ReaxmlParser\Nodes\ExternalLink;
use AdGroup\ReaxmlParser\Nodes\VideoLink;
use AdGroup\ReaxmlParser\Nodes\ExtraFields;
use AdGroup\ReaxmlParser\Nodes\Images;
use AdGroup\ReaxmlParser\Nodes\Views;
use AdGroup\ReaxmlParser\Nodes\Objects;
use AdGroup\ReaxmlParser\Nodes\Media;
use AdGroup\ReaxmlParser\Nodes\Project;

#[\AllowDynamicProperties]
class Land extends ListingType
{
    const NODE_NAME = "land";

    public ?AgentId $agentId = null;
    public ?UniqueId $uniqueId = null;
    public ?Authority $authority = null;
    public ?UnderOffer $underOffer = null;
    public ?array $listingAgent = null;
    public ?Price $price = null;
    public ?PriceView $priceView = null;
    public ?Address $address = null;
    public ?Municipality $municipality = null;
    public ?Estate $estate = null;
    public ?StreetDirectory $streetDirectory = null;
    public ?LandCategory $landCategory = null;
    public ?Headline $headline = null;
    public ?Description $description = null;
    public ?Features $features = null;
    public ?SoldDetails $soldDetails = null;
    public ?LandDetails $landDetails = null;
    public ?InspectionTimes $inspectionTimes = null;
    public ?Auction $auction = null;
    public ?AuctionOutcome $auctionOutcome = null;
    public ?array $vendorDetails = null;
    public ?YearBuilt $yearBuilt = null;
    public ?YearLastRenovated $yearLastRenovated = null;
    public ?array $externalLink = null;
    public ?VideoLink $videoLink = null;
    public ?ExtraFields $extraFields = null;
    public ?Images $images = null;
    public ?Views $views = null;
    public ?Objects $objects = null;
    public ?Media $media = null;
    public ?Project $project = null;

    public function __construct() {}

    protected function mapping(): array
    {
        return [
            AgentId::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->agentId = new AgentId($node[0]),
            UniqueId::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->uniqueId = new UniqueId($node[0]),
            Authority::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->authority = new Authority($node[0]),
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
            Address::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->address = new Address($node[0]),
            Municipality::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->municipality = new Municipality($node[0]),
            Estate::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->estate = new Estate($node[0]),
            StreetDirectory::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->streetDirectory = new StreetDirectory($node[0]),
            LandCategory::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->landCategory = new LandCategory($node[0]),
            Headline::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->headline = new Headline($node[0]),
            Description::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->description = new Description($node[0]),
            Features::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->features = new Features($node[0]),
            SoldDetails::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->soldDetails = new SoldDetails($node[0]),
            LandDetails::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->landDetails = new LandDetails($node[0]),
            InspectionTimes::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->inspectionTimes = new InspectionTimes($node[0]),
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
            Views::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->views = new Views($node[0]),
            Objects::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->objects = new Objects($node[0]),
            Media::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->media = new Media($node[0]),
            Project::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->project = new Project($node[0]),
        ];
    }
}
