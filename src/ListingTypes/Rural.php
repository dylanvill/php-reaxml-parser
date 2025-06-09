<?php

namespace AdGroup\ReaxmlParser\ListingTypes;

use AdGroup\ReaxmlParser\Enums\ListingStatusEnum;
use AdGroup\ReaxmlParser\Nodes\AgentId;
use AdGroup\ReaxmlParser\Nodes\UniqueId;
use AdGroup\ReaxmlParser\Nodes\Authority;
use AdGroup\ReaxmlParser\Nodes\UnderOffer;
use AdGroup\ReaxmlParser\Nodes\ListingAgent;
use AdGroup\ReaxmlParser\Nodes\Price;
use AdGroup\ReaxmlParser\Nodes\PriceView;
use AdGroup\ReaxmlParser\Nodes\Address;
use AdGroup\ReaxmlParser\Nodes\Municipality;
use AdGroup\ReaxmlParser\Nodes\StreetDirectory;
use AdGroup\ReaxmlParser\Nodes\RuralCategory;
use AdGroup\ReaxmlParser\Nodes\Headline;
use AdGroup\ReaxmlParser\Nodes\Description;
use AdGroup\ReaxmlParser\Nodes\Features;
use AdGroup\ReaxmlParser\Nodes\RuralFeatures;
use AdGroup\ReaxmlParser\Nodes\SoldDetails;
use AdGroup\ReaxmlParser\Nodes\LandDetails;
use AdGroup\ReaxmlParser\Nodes\BuildingDetails;
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
use AdGroup\ReaxmlParser\Nodes\EcoFriendly;
use AdGroup\ReaxmlParser\Nodes\IdealFor;
use AdGroup\ReaxmlParser\Nodes\Views;
use AdGroup\ReaxmlParser\Nodes\Objects;
use AdGroup\ReaxmlParser\Nodes\Media;
use SimpleXMLElement;

class Rural
{
    public string $modTime;
    public ListingStatusEnum $status;

    public AgentId $agentId;
    public UniqueId $uniqueId;
    public ?Authority $authority;
    public ?UnderOffer $underOffer;
    /** @var Array<ListingAgent> */
    public ?array $listingAgent;
    public ?Price $price;
    public ?PriceView $priceView;
    public ?Address $address;
    public ?Municipality $municipality;
    public ?StreetDirectory $streetDirectory;
    public ?RuralCategory $ruralCategory;
    public ?Headline $headline;
    public ?Description $description;
    public ?Features $features;
    public ?RuralFeatures $ruralFeatures;
    public ?SoldDetails $soldDetails;
    public ?LandDetails $landDetails;
    public ?BuildingDetails $buildingDetails;
    public ?InspectionTimes $inspectionTimes;
    public ?Auction $auction;
    public ?AuctionOutcome $auctionOutcome;
    /** @var Array<VendorDetails> */
    public ?VendorDetails $vendorDetails;
    public ?YearBuilt $yearBuilt;
    public ?YearLastRenovated $yearLastRenovated;
    /** @var Array<ExternalLink> */
    public ?ExternalLink $externalLink;
    public ?VideoLink $videoLink;
    public ?ExtraFields $extraFields;
    public ?Images $images;
    public ?EcoFriendly $ecoFriendly;
    public ?IdealFor $idealFor;
    public ?Views $views;
    public ?Objects $objects;
    public ?Media $media;

    public function __construct(SimpleXMLElement $node) {}
}
