<?php

namespace AdGroup\ReaxmlParser\ListingTypes;

use AdGroup\ReaxmlParser\Enums\ListingStatusEnum;
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
use SimpleXMLElement;

class Commercial
{
    public string $modTime;
    public ListingStatusEnum $status;

    public AgentId $agentId;
    public UniqueId $uniqueId;
    public ?Marketing $marketing;
    public ?CommercialAuthority $commercialAuthority;
    public ?Exclusivity $exclusivity;
    public ?CommercialListingType $commercialListingType;
    public ?UnderOffer $underOffer;
    /** @var Array<ListingAgent> */
    public ?array $listingAgent;
    public ?Price $price;
    public ?PriceView $priceView;
    public ?CommercialRent $commercialRent;
    public ?Outgoings $outgoings;
    public ?ReturnNode $return;
    public ?CurrentLeaseEndDate $currentLeaseEndDate;
    public ?Tenancy $tenancy;
    public ?FurtherOptions $furtherOptions;
    public ?IsMultiple $isMultiple;
    public ?Address $address;
    public ?Municipality $municipality;
    public ?StreetDirectory $streetDirectory;
    /** @var Array<CommercialCategory> */
    public ?array $commercialCategory;
    public ?Headline $headline;
    public ?Description $description;
    /** @var Array<Highlight> */
    public ?array $highlight;
    public ?SoldDetails $soldDetails;
    public ?LandDetails $landDetails;
    public ?BuildingDetails $buildingDetails;
    public ?PropertyExtent $propertyExtent;
    public ?CarSpaces $carSpaces;
    public ?ParkingComments $parkingComments;
    public ?Auction $auction;
    public ?AuctionOutcome $auctionOutcome;
    /** @var Array<VendorDetails> */
    public ?array $vendorDetails;
    public ?YearBuilt $yearBuilt;
    public ?YearLastRenovated $yearLastRenovated;
    public ?Zone $zone;
    public ?ExternalLink $externalLink;
    public ?VideoLink $videoLink;
    public ?ExtraFields $extraFields;
    public ?Images $images;
    public ?Objects $objects;
    public ?Miniweb $miniweb;
    public ?PurchaseOrder $purchaseOrder;

    public function __construct(SimpleXMLElement $node) {}
}
