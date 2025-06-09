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
use AdGroup\ReaxmlParser\Nodes\DepositTaken;
use AdGroup\ReaxmlParser\Nodes\Address;
use AdGroup\ReaxmlParser\Nodes\Municipality;
use AdGroup\ReaxmlParser\Nodes\StreetDirectory;
use AdGroup\ReaxmlParser\Nodes\Category;
use AdGroup\ReaxmlParser\Nodes\Headline;
use AdGroup\ReaxmlParser\Nodes\Description;
use AdGroup\ReaxmlParser\Nodes\Features;
use AdGroup\ReaxmlParser\Nodes\Holiday;
use AdGroup\ReaxmlParser\Nodes\LandDetails;
use AdGroup\ReaxmlParser\Nodes\NewConstruction;
use AdGroup\ReaxmlParser\Nodes\BuildingDetails;
use AdGroup\ReaxmlParser\Nodes\InspectionTimes;
use AdGroup\ReaxmlParser\Nodes\ExternalLink;
use AdGroup\ReaxmlParser\Nodes\VideoLink;
use AdGroup\ReaxmlParser\Nodes\ExtraFields;
use AdGroup\ReaxmlParser\Nodes\Images;
use AdGroup\ReaxmlParser\Nodes\Objects;
use AdGroup\ReaxmlParser\Nodes\EcoFriendly;
use AdGroup\ReaxmlParser\Nodes\Views;
use AdGroup\ReaxmlParser\Nodes\Allowances;

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
