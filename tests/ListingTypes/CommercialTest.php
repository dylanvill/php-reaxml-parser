<?php

namespace AdGroup\ReaxmlParser\Tests\ListingTypes;

use AdGroup\ReaxmlParser\Contracts\ListingType;
use AdGroup\ReaxmlParser\ListingTypes\Commercial;
use AdGroup\ReaxmlParser\Tests\Traits\TestsListingType;
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
use Orchestra\Testbench\PHPUnit\TestCase;


class CommercialTest extends TestCase
{
    use TestsListingType;

    protected function nodeName(): string
    {
        return Commercial::NODE_NAME;
    }

    protected function nodeClass(): string
    {
        return Commercial::class;
    }

    protected function xmlProperties(): array
    {
        return [
            "agentId",
            "uniqueId",
            "marketing",
            "commercialAuthority",
            "exclusivity",
            "commercialListingType",
            "underOffer",
            "listingAgent",
            "price",
            "priceView",
            "commercialRent",
            "outgoings",
            "return",
            "currentLeaseEndDate",
            "tenancy",
            "furtherOptions",
            "isMultiple",
            "address",
            "municipality",
            "streetDirectory",
            "commercialCategory",
            "headline",
            "description",
            "highlight",
            "soldDetails",
            "landDetails",
            "buildingDetails",
            "propertyExtent",
            "carSpaces",
            "parkingComments",
            "auction",
            "auctionOutcome",
            "vendorDetails",
            "yearBuilt",
            "yearLastRenovated",
            "zone",
            "externalLink",
            "videoLink",
            "extraFields",
            "images",
            "objects",
            "miniweb",
            "purchaseOrder",
        ];
    }

    protected function xmlClassAndPropertyMapping(): array
    {
        return [
            AgentId::NODE_NAME => ["class" => AgentId::class, "property" => "agentId"],
            UniqueId::NODE_NAME => ["class" => UniqueId::class, "property" => "uniqueId"],
            Marketing::NODE_NAME => ["class" => Marketing::class, "property" => "marketing"],
            CommercialAuthority::NODE_NAME => ["class" => CommercialAuthority::class, "property" => "commercialAuthority"],
            Exclusivity::NODE_NAME => ["class" => Exclusivity::class, "property" => "exclusivity"],
            CommercialListingType::NODE_NAME => ["class" => CommercialListingType::class, "property" => "commercialListingType"],
            UnderOffer::NODE_NAME => ["class" => UnderOffer::class, "property" => "underOffer"],
            ListingAgent::NODE_NAME => ["class" => ListingAgent::class, "property" => "listingAgent"],
            Price::NODE_NAME => ["class" => Price::class, "property" => "price"],
            PriceView::NODE_NAME => ["class" => PriceView::class, "property" => "priceView"],
            CommercialRent::NODE_NAME => ["class" => CommercialRent::class, "property" => "commercialRent"],
            Outgoings::NODE_NAME => ["class" => Outgoings::class, "property" => "outgoings"],
            ReturnNode::NODE_NAME => ["class" => ReturnNode::class, "property" => "return"],
            CurrentLeaseEndDate::NODE_NAME => ["class" => CurrentLeaseEndDate::class, "property" => "currentLeaseEndDate"],
            Tenancy::NODE_NAME => ["class" => Tenancy::class, "property" => "tenancy"],
            FurtherOptions::NODE_NAME => ["class" => FurtherOptions::class, "property" => "furtherOptions"],
            IsMultiple::NODE_NAME => ["class" => IsMultiple::class, "property" => "isMultiple"],
            Address::NODE_NAME => ["class" => Address::class, "property" => "address"],
            Municipality::NODE_NAME => ["class" => Municipality::class, "property" => "municipality"],
            StreetDirectory::NODE_NAME => ["class" => StreetDirectory::class, "property" => "streetDirectory"],
            CommercialCategory::NODE_NAME => ["class" => CommercialCategory::class, "property" => "commercialCategory"],
            Headline::NODE_NAME => ["class" => Headline::class, "property" => "headline"],
            Description::NODE_NAME => ["class" => Description::class, "property" => "description"],
            Highlight::NODE_NAME => ["class" => Highlight::class, "property" => "highlight"],
            SoldDetails::NODE_NAME => ["class" => SoldDetails::class, "property" => "soldDetails"],
            LandDetails::NODE_NAME => ["class" => LandDetails::class, "property" => "landDetails"],
            BuildingDetails::NODE_NAME => ["class" => BuildingDetails::class, "property" => "buildingDetails"],
            PropertyExtent::NODE_NAME => ["class" => PropertyExtent::class, "property" => "propertyExtent"],
            CarSpaces::NODE_NAME => ["class" => CarSpaces::class, "property" => "carSpaces"],
            ParkingComments::NODE_NAME => ["class" => ParkingComments::class, "property" => "parkingComments"],
            Auction::NODE_NAME => ["class" => Auction::class, "property" => "auction"],
            AuctionOutcome::NODE_NAME => ["class" => AuctionOutcome::class, "property" => "auctionOutcome"],
            VendorDetails::NODE_NAME => ["class" => VendorDetails::class, "property" => "vendorDetails"],
            YearBuilt::NODE_NAME => ["class" => YearBuilt::class, "property" => "yearBuilt"],
            YearLastRenovated::NODE_NAME => ["class" => YearLastRenovated::class, "property" => "yearLastRenovated"],
            Zone::NODE_NAME => ["class" => Zone::class, "property" => "zone"],
            ExternalLink::NODE_NAME => ["class" => ExternalLink::class, "property" => "externalLink"],
            VideoLink::NODE_NAME => ["class" => VideoLink::class, "property" => "videoLink"],
            ExtraFields::NODE_NAME => ["class" => ExtraFields::class, "property" => "extraFields"],
            Images::NODE_NAME => ["class" => Images::class, "property" => "images"],
            Objects::NODE_NAME => ["class" => Objects::class, "property" => "objects"],
            Miniweb::NODE_NAME => ["class" => Miniweb::class, "property" => "miniweb"],
            PurchaseOrder::NODE_NAME => ["class" => PurchaseOrder::class, "property" => "purchaseOrder"],
        ];
    }
}
