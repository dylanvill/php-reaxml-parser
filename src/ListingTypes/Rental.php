<?php

namespace App\ReaXml\ListingTypes;

use App\ReaXml\Enums\ListingStatusEnum;
use App\ReaXml\Nodes\AgentId;
use App\ReaXml\Nodes\UniqueId;
use App\ReaXml\Nodes\ListingAgent;
use App\ReaXml\Nodes\DateAvailable;
use App\ReaXml\Nodes\Rent;
use App\ReaXml\Nodes\PriceView;
use App\ReaXml\Nodes\Bond;
use App\ReaXml\Nodes\DepositTaken;
use App\ReaXml\Nodes\Address;
use App\ReaXml\Nodes\Municipality;
use App\ReaXml\Nodes\StreetDirectory;
use App\ReaXml\Nodes\Category;
use App\ReaXml\Nodes\Headline;
use App\ReaXml\Nodes\Description;
use App\ReaXml\Nodes\Features;
use App\ReaXml\Nodes\Holiday;
use App\ReaXml\Nodes\LandDetails;
use App\ReaXml\Nodes\NewConstruction;
use App\ReaXml\Nodes\BuildingDetails;
use App\ReaXml\Nodes\InspectionTimes;
use App\ReaXml\Nodes\ExternalLink;
use App\ReaXml\Nodes\VideoLink;
use App\ReaXml\Nodes\ExtraFields;
use App\ReaXml\Nodes\Images;
use App\ReaXml\Nodes\Objects;
use App\ReaXml\Nodes\EcoFriendly;
use App\ReaXml\Nodes\Views;
use App\ReaXml\Nodes\Allowances;

use SimpleXMLElement;

class HolidayRental
{
    public string $modTime;
    public ListingStatusEnum $status;

    public AgentId $agentId;
    public UniqueId $uniqueId;
    /** @var Array<ListingAgent> */
    public ?array $listingAgent;
    public ?DateAvailable $dateAvailable;
    /** @var Array<Rent> */
    public ?array $rent;
    public ?PriceView $priceView;
    public ?Bond $bond;
    public ?DepositTaken $depositTaken;
    public ?Address $address;
    public ?Municipality $municipality;
    public ?StreetDirectory $streetDirectory;
    public ?Category $category;
    public ?Headline $headline;
    public ?Description $description;
    public ?Features $features;
    public ?Holiday $holiday;
    public ?LandDetails $landDetails;
    public ?NewConstruction $newConstruction;
    public ?BuildingDetails $buildingDetails;
    public ?InspectionTimes $inspectionTimes;
    /** @var Array<ExternalLink> */
    public ?array $externalLink;
    public ?VideoLink $videoLink;
    public ?ExtraFields $extraFields;
    public ?Images $images;
    public ?Objects $objects;
    public ?EcoFriendly $ecoFriendly;
    public ?Views $views;
    public ?Allowances $allowances;

    public function __construct(SimpleXMLElement $node) {}
}
