<?php

namespace AdGroup\ReaxmlParser\Tests\ListingTypes;

use AdGroup\ReaxmlParser\Contracts\ListingType;
use AdGroup\ReaxmlParser\ListingTypes\Rural;
use AdGroup\ReaxmlParser\Nodes\AgentId;
use AdGroup\ReaxmlParser\Nodes\UniqueId;
use AdGroup\ReaxmlParser\Nodes\Authority;
use AdGroup\ReaxmlParser\Nodes\UnderOffer;
use AdGroup\ReaxmlParser\Nodes\ListingAgent;
use AdGroup\ReaxmlParser\Nodes\Price;
use AdGroup\ReaxmlParser\Nodes\PriceView;
use AdGroup\ReaxmlParser\Nodes\Address;
use AdGroup\ReaxmlParser\Nodes\Municipality;
use AdGroup\ReaxmlParser\Nodes\StreetDirectory;
use AdGroup\ReaxmlParser\Nodes\RuralCategory;
use AdGroup\ReaxmlParser\Nodes\Headline;
use AdGroup\ReaxmlParser\Nodes\Description;
use AdGroup\ReaxmlParser\Nodes\Features;
use AdGroup\ReaxmlParser\Nodes\RuralFeatures;
use AdGroup\ReaxmlParser\Nodes\SoldDetails;
use AdGroup\ReaxmlParser\Nodes\LandDetails;
use AdGroup\ReaxmlParser\Nodes\BuildingDetails;
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
use AdGroup\ReaxmlParser\Nodes\EcoFriendly;
use AdGroup\ReaxmlParser\Nodes\IdealFor;
use AdGroup\ReaxmlParser\Nodes\Views;
use AdGroup\ReaxmlParser\Nodes\Objects;
use AdGroup\ReaxmlParser\Nodes\Media;
use AdGroup\ReaxmlParser\Tests\Traits\TestsListingType;
use Orchestra\Testbench\PHPUnit\TestCase;


class RuralTest extends TestCase
{
    use TestsListingType;

    protected function nodeName(): string
    {
        return Rural::NODE_NAME;
    }

    protected function nodeClass(): ListingType
    {
        return new Rural();
    }

    protected function xmlProperties(): array
    {
        return [
            "agentId",
            "uniqueId",
            "authority",
            "underOffer",
            "listingAgent",
            "price",
            "priceView",
            "address",
            "municipality",
            "streetDirectory",
            "ruralCategory",
            "headline",
            "description",
            "features",
            "ruralFeatures",
            "soldDetails",
            "landDetails",
            "buildingDetails",
            "inspectionTimes",
            "auction",
            "auctionOutcome",
            "vendorDetails",
            "yearBuilt",
            "yearLastRenovated",
            "externalLink",
            "videoLink",
            "extraFields",
            "images",
            "ecoFriendly",
            "idealFor",
            "views",
            "objects",
            "media",
        ];
    }

    protected function xmlClassAndPropertyMapping(): array
    {
        return [
            AgentId::NODE_NAME => ["class" => AgentId::class, "property" => "agentId"],
            UniqueId::NODE_NAME => ["class" => UniqueId::class, "property" => "uniqueId"],
            Authority::NODE_NAME => ["class" => Authority::class, "property" => "authority"],
            UnderOffer::NODE_NAME => ["class" => UnderOffer::class, "property" => "underOffer"],
            ListingAgent::NODE_NAME => ["class" => ListingAgent::class, "property" => "listingAgent"],
            Price::NODE_NAME => ["class" => Price::class, "property" => "price"],
            PriceView::NODE_NAME => ["class" => PriceView::class, "property" => "priceView"],
            Address::NODE_NAME => ["class" => Address::class, "property" => "address"],
            Municipality::NODE_NAME => ["class" => Municipality::class, "property" => "municipality"],
            StreetDirectory::NODE_NAME => ["class" => StreetDirectory::class, "property" => "streetDirectory"],
            RuralCategory::NODE_NAME => ["class" => RuralCategory::class, "property" => "ruralCategory"],
            Headline::NODE_NAME => ["class" => Headline::class, "property" => "headline"],
            Description::NODE_NAME => ["class" => Description::class, "property" => "description"],
            Features::NODE_NAME => ["class" => Features::class, "property" => "features"],
            RuralFeatures::NODE_NAME => ["class" => RuralFeatures::class, "property" => "ruralFeatures"],
            SoldDetails::NODE_NAME => ["class" => SoldDetails::class, "property" => "soldDetails"],
            LandDetails::NODE_NAME => ["class" => LandDetails::class, "property" => "landDetails"],
            BuildingDetails::NODE_NAME => ["class" => BuildingDetails::class, "property" => "buildingDetails"],
            InspectionTimes::NODE_NAME => ["class" => InspectionTimes::class, "property" => "inspectionTimes"],
            Auction::NODE_NAME => ["class" => Auction::class, "property" => "auction"],
            AuctionOutcome::NODE_NAME => ["class" => AuctionOutcome::class, "property" => "auctionOutcome"],
            VendorDetails::NODE_NAME => ["class" => VendorDetails::class, "property" => "vendorDetails"],
            YearBuilt::NODE_NAME => ["class" => YearBuilt::class, "property" => "yearBuilt"],
            YearLastRenovated::NODE_NAME => ["class" => YearLastRenovated::class, "property" => "yearLastRenovated"],
            ExternalLink::NODE_NAME => ["class" => ExternalLink::class, "property" => "externalLink"],
            VideoLink::NODE_NAME => ["class" => VideoLink::class, "property" => "videoLink"],
            ExtraFields::NODE_NAME => ["class" => ExtraFields::class, "property" => "extraFields"],
            Images::NODE_NAME => ["class" => Images::class, "property" => "images"],
            EcoFriendly::NODE_NAME => ["class" => EcoFriendly::class, "property" => "ecoFriendly"],
            IdealFor::NODE_NAME => ["class" => IdealFor::class, "property" => "idealFor"],
            Views::NODE_NAME => ["class" => Views::class, "property" => "views"],
            Objects::NODE_NAME => ["class" => Objects::class, "property" => "objects"],
            Media::NODE_NAME => ["class" => Media::class, "property" => "media"],
        ];
    }
}
