<?php

namespace AdGroup\ReaxmlParser\Tests\ListingTypes;

use AdGroup\ReaxmlParser\Contracts\ListingType;
use AdGroup\ReaxmlParser\ListingTypes\HolidayRental;
use AdGroup\ReaxmlParser\Tests\Traits\TestsListingType;
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
use AdGroup\ReaxmlParser\Tests\Traits\TestsExtraElements;
use Orchestra\Testbench\PHPUnit\TestCase;


class HolidayRentalTest extends TestCase
{
    use TestsListingType, TestsExtraElements;

    protected function nodeName(): string
    {
        return HolidayRental::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return HolidayRental::class;
    }

    protected function xmlProperties(): array
    {
        return [
            "agentId",
            "uniqueId",
            "listingAgent",
            "dateAvailable",
            "rent",
            "priceView",
            "bond",
            "address",
            "municipality",
            "streetDirectory",
            "holidayCategory",
            "headline",
            "description",
            "features",
            "landDetails",
            "buildingDetails",
            "inspectionTimes",
            "externalLink",
            "availabilityLink",
            "extraFields",
            "images",
            "objects",
        ];
    }

    protected function xmlClassAndPropertyMapping(): array
    {
        return [
            AgentId::NODE_NAME => ["class" => AgentId::class, "property" => "agentId"],
            UniqueId::NODE_NAME => ["class" => UniqueId::class, "property" => "uniqueId"],
            ListingAgent::NODE_NAME => ["class" => ListingAgent::class, "property" => "listingAgent"],
            DateAvailable::NODE_NAME => ["class" => DateAvailable::class, "property" => "dateAvailable"],
            Rent::NODE_NAME => ["class" => Rent::class, "property" => "rent"],
            PriceView::NODE_NAME => ["class" => PriceView::class, "property" => "priceView"],
            Bond::NODE_NAME => ["class" => Bond::class, "property" => "bond"],
            Address::NODE_NAME => ["class" => Address::class, "property" => "address"],
            Municipality::NODE_NAME => ["class" => Municipality::class, "property" => "municipality"],
            StreetDirectory::NODE_NAME => ["class" => StreetDirectory::class, "property" => "streetDirectory"],
            HolidayCategory::NODE_NAME => ["class" => HolidayCategory::class, "property" => "holidayCategory"],
            Headline::NODE_NAME => ["class" => Headline::class, "property" => "headline"],
            Description::NODE_NAME => ["class" => Description::class, "property" => "description"],
            Features::NODE_NAME => ["class" => Features::class, "property" => "features"],
            LandDetails::NODE_NAME => ["class" => LandDetails::class, "property" => "landDetails"],
            BuildingDetails::NODE_NAME => ["class" => BuildingDetails::class, "property" => "buildingDetails"],
            InspectionTimes::NODE_NAME => ["class" => InspectionTimes::class, "property" => "inspectionTimes"],
            ExternalLink::NODE_NAME => ["class" => ExternalLink::class, "property" => "externalLink"],
            AvailabilityLink::NODE_NAME => ["class" => AvailabilityLink::class, "property" => "availabilityLink"],
            ExtraFields::NODE_NAME => ["class" => ExtraFields::class, "property" => "extraFields"],
            Images::NODE_NAME => ["class" => Images::class, "property" => "images"],
            Objects::NODE_NAME => ["class" => Objects::class, "property" => "objects"],
        ];
    }
}
