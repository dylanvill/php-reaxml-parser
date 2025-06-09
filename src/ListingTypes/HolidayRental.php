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
use App\ReaXml\Nodes\Address;
use App\ReaXml\Nodes\Municipality;
use App\ReaXml\Nodes\StreetDirectory;
use App\ReaXml\Nodes\HolidayCategory;
use App\ReaXml\Nodes\Headline;
use App\ReaXml\Nodes\Description;
use App\ReaXml\Nodes\Features;
use App\ReaXml\Nodes\LandDetails;
use App\ReaXml\Nodes\BuildingDetails;
use App\ReaXml\Nodes\InspectionTimes;
use App\ReaXml\Nodes\ExternalLink;
use App\ReaXml\Nodes\AvailabilityLink;
use App\ReaXml\Nodes\ExtraFields;
use App\ReaXml\Nodes\Images;
use App\ReaXml\Nodes\Objects;

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
    public ?Rent $rent;
    public ?PriceView $priceView;
    public ?Bond $bond;
    public ?Address $address;
    public ?Municipality $municipality;
    public ?StreetDirectory $streetDirectory;
    public ?HolidayCategory $holidayCategory;
    public ?Headline $headline;
    public ?Description $description;
    public ?Features $features;
    public ?LandDetails $landDetails;
    public ?BuildingDetails $buildingDetails;
    public ?InspectionTimes $inspectionTimes;
    /** @var Array<ExternalLink> */
    public ?array $externalLink;
    public ?AvailabilityLink $availabilityLink;
    public ?ExtraFields $extraFields;
    public ?Images $images;
    public ?Objects $objects;

    public function __construct(SimpleXMLElement $node) {}
}
