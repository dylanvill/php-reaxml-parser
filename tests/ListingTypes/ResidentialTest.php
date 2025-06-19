<?php

namespace AdGroup\ReaxmlParser\Tests\ListingTypes;

use AdGroup\ReaxmlParser\Enums\ListingStatusEnum;
use AdGroup\ReaxmlParser\ListingTypes\Residential;
use AdGroup\ReaxmlParser\Nodes\AgentId;
use AdGroup\ReaxmlParser\Nodes\UniqueId;
use AdGroup\ReaxmlParser\Nodes\Authority;
use AdGroup\ReaxmlParser\Nodes\UnderOffer;
use AdGroup\ReaxmlParser\Nodes\IsHomeLandPackage;
use AdGroup\ReaxmlParser\Nodes\ListingAgent;
use AdGroup\ReaxmlParser\Nodes\Price;
use AdGroup\ReaxmlParser\Nodes\PriceView;
use AdGroup\ReaxmlParser\Nodes\Address;
use AdGroup\ReaxmlParser\Nodes\Municipality;
use AdGroup\ReaxmlParser\Nodes\StreetDirectory;
use AdGroup\ReaxmlParser\Nodes\Category;
use AdGroup\ReaxmlParser\Nodes\Headline;
use AdGroup\ReaxmlParser\Nodes\Description;
use AdGroup\ReaxmlParser\Nodes\Features;
use AdGroup\ReaxmlParser\Nodes\SoldDetails;
use AdGroup\ReaxmlParser\Nodes\LandDetails;
use AdGroup\ReaxmlParser\Nodes\BuildingDetails;
use AdGroup\ReaxmlParser\Nodes\InspectionTimes;
use AdGroup\ReaxmlParser\Nodes\Auction;
use AdGroup\ReaxmlParser\Nodes\AuctionOutcome;
use AdGroup\ReaxmlParser\Nodes\VendorDetails;
use AdGroup\ReaxmlParser\Nodes\YearBuilt;
use AdGroup\ReaxmlParser\Nodes\YearLastRenovated;
use AdGroup\ReaxmlParser\Nodes\VideoLink;
use AdGroup\ReaxmlParser\Nodes\ExtraFields;
use AdGroup\ReaxmlParser\Nodes\Images;
use AdGroup\ReaxmlParser\Nodes\NewConstruction;
use AdGroup\ReaxmlParser\Nodes\EcoFriendly;
use AdGroup\ReaxmlParser\Nodes\IdealFor;
use AdGroup\ReaxmlParser\Nodes\Views;
use AdGroup\ReaxmlParser\Nodes\Objects;
use AdGroup\ReaxmlParser\Nodes\Media;
use AdGroup\ReaxmlParser\Nodes\Project;
use AdGroup\ReaxmlParser\Nodes\ExternalLink;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use AdGroup\ReaxmlParser\Tests\Traits\LoadsXmlStub;
use Orchestra\Testbench\PHPUnit\TestCase;


class ResidentialTest extends TestCase
{
    const SAMPLE_XML = "residential_sample.xml";

    use GeneratesSampleXml;

    private Residential $residential;

    public function test_mod_time_is_null(): void
    {
        $xml = $this->generateXml(Residential::NODE_NAME);
        $residential = new Residential($xml);

        $this->assertNull($residential->modTime);
    }

    public function test_mod_time_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Residential::NODE_NAME, ["modTime" => "mod-time-test"]);
        $residential = new Residential($xml);

        $this->assertEquals("mod-time-test", $residential->modTime);
    }

    public function test_status_is_null(): void
    {
        $xml = $this->generateXml(Residential::NODE_NAME);
        $residential = new Residential($xml);

        $this->assertNull($residential->status);
    }

    public function test_status_has_the_correct_value(): void
    {
        $xml = $this->generateXml(Residential::NODE_NAME, ["status" => "current"]);
        $residential = new Residential($xml);

        $this->assertEquals(ListingStatusEnum::CURRENT, $residential->status);
    }

    public function test_status_is_null_when_it_is_not_part_of_the_expected_values(): void
    {
        $xml = $this->generateXml(Residential::NODE_NAME, ["status" => "random-value"]);
        $residential = new Residential($xml);

        $this->assertNull($residential->status);
    }

    public function test_all_properties_are_null_when_there_are_no_child_elements(): void
    {
        $properties = [
            "agentId",
            "uniqueId",
            "authority",
            "underOffer",
            "isHomeLandPackage",
            "price",
            "priceView",
            "address",
            "municipality",
            "streetDirectory",
            "category",
            "headline",
            "description",
            "features",
            "soldDetails",
            "landDetails",
            "buildingDetails",
            "inspectionTimes",
            "auction",
            "auctionOutcome",
            "yearBuilt",
            "yearLastRenovated",
            "videoLink",
            "extraFields",
            "images",
            "newConstruction",
            "ecoFriendly",
            "idealFor",
            "views",
            "objects",
            "media",
            "project",
            "listingAgent",
            "vendorDetails",
            "externalLink",
        ];

        $xml = $this->generateXml(Residential::NODE_NAME);
        $residential = new Residential($xml);

        foreach ($properties as $property) {
            $this->assertNull($residential->{$property});
        }
    }

    /**
     * This only tests that the instantiation is mapped correctly because each of the
     * listing type's child nodes have their own unit tests that tests that the
     * values and attributes are correct. We no longer test it again in this
     * parent listing type class.
     *
     * @return void
     */
    public function test_all_properties_are_instantiated_correctly(): void
    {
        $map = [
            AgentId::NODE_NAME => ["class" => AgentId::class, "property" => "agentId"],
            UniqueId::NODE_NAME => ["class" => UniqueId::class, "property" => "uniqueId"],
            Authority::NODE_NAME => ["class" => Authority::class, "property" => "authority"],
            UnderOffer::NODE_NAME => ["class" => UnderOffer::class, "property" => "underOffer"],
            IsHomeLandPackage::NODE_NAME => ["class" => IsHomeLandPackage::class, "property" => "isHomeLandPackage"],
            Price::NODE_NAME => ["class" => Price::class, "property" => "price"],
            PriceView::NODE_NAME => ["class" => PriceView::class, "property" => "priceView"],
            Address::NODE_NAME => ["class" => Address::class, "property" => "address"],
            Municipality::NODE_NAME => ["class" => Municipality::class, "property" => "municipality"],
            StreetDirectory::NODE_NAME => ["class" => StreetDirectory::class, "property" => "streetDirectory"],
            Category::NODE_NAME => ["class" => Category::class, "property" => "category"],
            Headline::NODE_NAME => ["class" => Headline::class, "property" => "headline"],
            Description::NODE_NAME => ["class" => Description::class, "property" => "description"],
            Features::NODE_NAME => ["class" => Features::class, "property" => "features"],
            SoldDetails::NODE_NAME => ["class" => SoldDetails::class, "property" => "soldDetails"],
            LandDetails::NODE_NAME => ["class" => LandDetails::class, "property" => "landDetails"],
            BuildingDetails::NODE_NAME => ["class" => BuildingDetails::class, "property" => "buildingDetails"],
            InspectionTimes::NODE_NAME => ["class" => InspectionTimes::class, "property" => "inspectionTimes"],
            Auction::NODE_NAME => ["class" => Auction::class, "property" => "auction"],
            AuctionOutcome::NODE_NAME => ["class" => AuctionOutcome::class, "property" => "auctionOutcome"],
            YearBuilt::NODE_NAME => ["class" => YearBuilt::class, "property" => "yearBuilt"],
            YearLastRenovated::NODE_NAME => ["class" => YearLastRenovated::class, "property" => "yearLastRenovated"],
            VideoLink::NODE_NAME => ["class" => VideoLink::class, "property" => "videoLink"],
            ExtraFields::NODE_NAME => ["class" => ExtraFields::class, "property" => "extraFields"],
            Images::NODE_NAME => ["class" => Images::class, "property" => "images"],
            NewConstruction::NODE_NAME => ["class" => NewConstruction::class, "property" => "newConstruction"],
            EcoFriendly::NODE_NAME => ["class" => EcoFriendly::class, "property" => "ecoFriendly"],
            IdealFor::NODE_NAME => ["class" => IdealFor::class, "property" => "idealFor"],
            Views::NODE_NAME => ["class" => Views::class, "property" => "views"],
            Objects::NODE_NAME => ["class" => Objects::class, "property" => "objects"],
            Media::NODE_NAME => ["class" => Media::class, "property" => "media"],
            Project::NODE_NAME => ["class" => Project::class, "property" => "project"],
        ];

        $xmlNodes = array_map(
            fn($name) => [
                "value" => "test-value",
                "attributes" => [],
                "name" => $name
            ],
            array_keys($map)
        );

        $xml = $this->generateXml(Residential::NODE_NAME, [], $xmlNodes);
        $residential = new Residential($xml);

        foreach ($map as $key => $value) {
            $this->assertInstanceOf($value["class"], $residential->{$value["property"]});
        }
    }
}
