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
use SimpleXMLElement;

class Land
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
    public ?Estate $estate;
    public ?StreetDirectory $streetDirectory;
    public ?LandCategory $landCategory;
    public ?Headline $headline;
    public ?Description $description;
    public ?Features $features;
    public ?SoldDetails $soldDetails;
    public ?LandDetails $landDetails;
    public ?InspectionTimes $inspectionTimes;
    public ?Auction $auction;
    public ?AuctionOutcome $auctionOutcome;
    /** @var Array<VendorDetails> */
    public ?array $vendorDetails;
    public ?YearBuilt $yearBuilt;
    public ?YearLastRenovated $yearLastRenovated;
    /** @var Array<ExternalLink> */
    public ?array $externalLink;
    public ?VideoLink $videoLink;
    public ?ExtraFields $extraFields;
    public ?Images $images;
    public ?Views $views;
    public ?Objects $objects;
    public ?Media $media;
    public ?Project $project;

    public function __construct(SimpleXMLElement $node) {}
}
