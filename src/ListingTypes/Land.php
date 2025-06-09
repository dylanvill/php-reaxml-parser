<?php

namespace App\ReaXml\ListingTypes;

use App\ReaXml\Enums\ListingStatusEnum;
use App\ReaXml\Nodes\AgentId;
use App\ReaXml\Nodes\UniqueId;
use App\ReaXml\Nodes\Authority;
use App\ReaXml\Nodes\UnderOffer;
use App\ReaXml\Nodes\ListingAgent;
use App\ReaXml\Nodes\Price;
use App\ReaXml\Nodes\PriceView;
use App\ReaXml\Nodes\Address;
use App\ReaXml\Nodes\Municipality;
use App\ReaXml\Nodes\Estate;
use App\ReaXml\Nodes\StreetDirectory;
use App\ReaXml\Nodes\LandCategory;
use App\ReaXml\Nodes\Headline;
use App\ReaXml\Nodes\Description;
use App\ReaXml\Nodes\Features;
use App\ReaXml\Nodes\SoldDetails;
use App\ReaXml\Nodes\LandDetails;
use App\ReaXml\Nodes\InspectionTimes;
use App\ReaXml\Nodes\Auction;
use App\ReaXml\Nodes\AuctionOutcome;
use App\ReaXml\Nodes\VendorDetails;
use App\ReaXml\Nodes\YearBuilt;
use App\ReaXml\Nodes\YearLastRenovated;
use App\ReaXml\Nodes\ExternalLink;
use App\ReaXml\Nodes\VideoLink;
use App\ReaXml\Nodes\ExtraFields;
use App\ReaXml\Nodes\Images;
use App\ReaXml\Nodes\Views;
use App\ReaXml\Nodes\Objects;
use App\ReaXml\Nodes\Media;
use App\ReaXml\Nodes\Project;
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
