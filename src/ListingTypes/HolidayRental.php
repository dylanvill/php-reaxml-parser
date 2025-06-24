<?php

namespace AdGroup\ReaxmlParser\ListingTypes;

use AdGroup\ReaxmlParser\Contracts\ListingType;
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


#[\AllowDynamicProperties]
class HolidayRental extends ListingType
{
    const NODE_NAME = "holidayRental";

    public ?AgentId $agentId = null;
    public ?UniqueId $uniqueId = null;
    public ?array $listingAgent = null;
    public ?DateAvailable $dateAvailable = null;
    public ?array $rent = null;
    public ?PriceView $priceView = null;
    public ?Bond $bond = null;
    public ?Address $address = null;
    public ?Municipality $municipality = null;
    public ?StreetDirectory $streetDirectory = null;
    public ?HolidayCategory $holidayCategory = null;
    public ?Headline $headline = null;
    public ?Description $description = null;
    public ?Features $features = null;
    public ?LandDetails $landDetails = null;
    public ?BuildingDetails $buildingDetails = null;
    public ?InspectionTimes $inspectionTimes = null;
    public ?array $externalLink = null;
    public ?AvailabilityLink $availabilityLink = null;
    public ?ExtraFields $extraFields = null;
    public ?Images $images = null;
    public ?Objects $objects = null;

    public function __construct() {}

    protected function mapping(): array
    {
        return [
            AgentId::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->agentId = new AgentId($node[0]),
            UniqueId::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->uniqueId = new UniqueId($node[0]),
            ListingAgent::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->listingAgent[] = new ListingAgent($element);
                    }
                }
            },
            DateAvailable::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->dateAvailable = new DateAvailable($node[0]),
            Rent::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->rent[] = new Rent($element);
                    }
                }
            },
            PriceView::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->priceView = new PriceView($node[0]),
            Bond::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->bond = new Bond($node[0]),
            Address::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->address = new Address($node[0]),
            Municipality::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->municipality = new Municipality($node[0]),
            StreetDirectory::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->streetDirectory = new StreetDirectory($node[0]),
            HolidayCategory::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->holidayCategory = new HolidayCategory($node[0]),
            Headline::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->headline = new Headline($node[0]),
            Description::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->description = new Description($node[0]),
            Features::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->features = new Features($node[0]),
            LandDetails::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->landDetails = new LandDetails($node[0]),
            BuildingDetails::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->buildingDetails = new BuildingDetails($node[0]),
            InspectionTimes::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->inspectionTimes = new InspectionTimes($node[0]),
            ExternalLink::NODE_NAME => function (?array $node = []) {
                foreach ($node as $element) {
                    if (!empty($element)) {
                        $this->externalLink[] = new ExternalLink($element);
                    }
                }
            },
            AvailabilityLink::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->availabilityLink = new AvailabilityLink($node[0]),
            ExtraFields::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->extraFields = new ExtraFields($node[0]),
            Images::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->images = new Images($node[0]),
            Objects::NODE_NAME => fn(?array $node) => empty($node) ? null : $this->objects = new Objects($node[0]),
        ];
    }
}
