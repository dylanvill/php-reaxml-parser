<?php

namespace AdGroup\ReaxmlParser\ListingTypes;

use AdGroup\ReaxmlParser\Enums\ListingStatusEnum;
use AdGroup\ReaxmlParser\Nodes\AgentId;
use AdGroup\ReaxmlParser\Nodes\UniqueId;
use AdGroup\ReaxmlParser\Nodes\ListingAgent;
use AdGroup\ReaxmlParser\Nodes\DateAvailable;
use AdGroup\ReaxmlParser\Nodes\Rent;
use AdGroup\ReaxmlParser\Nodes\PriceView;
use AdGroup\ReaxmlParser\Nodes\Bond;
use AdGroup\ReaxmlParser\Nodes\Address;
use AdGroup\ReaxmlParser\Nodes\Municipality;
use AdGroup\ReaxmlParser\Nodes\StreetDirectory;
use AdGroup\ReaxmlParser\Nodes\HolidayCategory;
use AdGroup\ReaxmlParser\Nodes\Headline;
use AdGroup\ReaxmlParser\Nodes\Description;
use AdGroup\ReaxmlParser\Nodes\Features;
use AdGroup\ReaxmlParser\Nodes\LandDetails;
use AdGroup\ReaxmlParser\Nodes\BuildingDetails;
use AdGroup\ReaxmlParser\Nodes\InspectionTimes;
use AdGroup\ReaxmlParser\Nodes\ExternalLink;
use AdGroup\ReaxmlParser\Nodes\AvailabilityLink;
use AdGroup\ReaxmlParser\Nodes\ExtraFields;
use AdGroup\ReaxmlParser\Nodes\Images;
use AdGroup\ReaxmlParser\Nodes\Objects;

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
