<?php

namespace App\ReaXml\ListingTypes;

use App\ReaXml\Enums\ListingStatusEnum;
use App\ReaXml\Nodes\AgentId;
use App\ReaXml\Nodes\UniqueId;
use App\ReaXml\Nodes\Marketing;
use App\ReaXml\Nodes\CommercialAuthority;
use App\ReaXml\Nodes\Exclusivity;
use App\ReaXml\Nodes\CommercialListingType;
use App\ReaXml\Nodes\UnderOffer;
use App\ReaXml\Nodes\ListingAgent;
use App\ReaXml\Nodes\Price;
use App\ReaXml\Nodes\PriceView;
use App\ReaXml\Nodes\CommercialRent;
use App\ReaXml\Nodes\Outgoings;
use App\ReaXml\Nodes\ReturnNode;
use App\ReaXml\Nodes\CurrentLeaseEndDate;
use App\ReaXml\Nodes\Tenancy;
use App\ReaXml\Nodes\FurtherOptions;
use App\ReaXml\Nodes\IsMultiple;
use App\ReaXml\Nodes\Address;
use App\ReaXml\Nodes\Municipality;
use App\ReaXml\Nodes\StreetDirectory;
use App\ReaXml\Nodes\CommercialCategory;
use App\ReaXml\Nodes\Headline;
use App\ReaXml\Nodes\Description;
use App\ReaXml\Nodes\Highlight;
use App\ReaXml\Nodes\SoldDetails;
use App\ReaXml\Nodes\LandDetails;
use App\ReaXml\Nodes\BuildingDetails;
use App\ReaXml\Nodes\PropertyExtent;
use App\ReaXml\Nodes\CarSpaces;
use App\ReaXml\Nodes\ParkingComments;
use App\ReaXml\Nodes\Auction;
use App\ReaXml\Nodes\AuctionOutcome;
use App\ReaXml\Nodes\VendorDetails;
use App\ReaXml\Nodes\YearBuilt;
use App\ReaXml\Nodes\YearLastRenovated;
use App\ReaXml\Nodes\Zone;
use App\ReaXml\Nodes\ExternalLink;
use App\ReaXml\Nodes\VideoLink;
use App\ReaXml\Nodes\ExtraFields;
use App\ReaXml\Nodes\Images;
use App\ReaXml\Nodes\Objects;
use App\ReaXml\Nodes\Miniweb;
use App\ReaXml\Nodes\PurchaseOrder;
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
