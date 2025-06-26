<?php

namespace AdGroup\ReaxmlParser\Tests;

use AdGroup\ReaxmlParser\Dtos\PropertyList;
use AdGroup\ReaxmlParser\Exceptions\IncorrectNodeArgument;
use AdGroup\ReaxmlParser\ListingTypes\Commercial;
use AdGroup\ReaxmlParser\ListingTypes\Land;
use AdGroup\ReaxmlParser\ListingTypes\Rental;
use AdGroup\ReaxmlParser\ListingTypes\Residential;
use AdGroup\ReaxmlParser\ListingTypes\Rural;
use AdGroup\ReaxmlParser\ReaxmlParser;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\PHPUnit\TestCase;
use SimpleXMLElement;

class ReaxmlParserTest extends TestCase
{
    use GeneratesSampleXml;

    const SAMPLE_XMLS = [
        "commercial" => "commercial_sample.xml",
        "land" => "land_sample.xml",
        "rental" => "rental_sample.xml",
        "residential" => "residential_sample.xml",
        "rural" => "rural_sample.xml",
        "empty" => "empty_sample.xml",
    ];

    private SimpleXMLElement $commercial;
    private SimpleXMLElement $land;
    private SimpleXMLElement $rental;
    private SimpleXMLElement $residential;
    private SimpleXMLElement $rural;
    private SimpleXMLElement $empty;

    public function setUp(): void
    {
        parent::setUp();

        $this->commercial = simplexml_load_file($this->sampleXmlPath("commercial"));
        $this->land = simplexml_load_file($this->sampleXmlPath("land"));
        $this->rental = simplexml_load_file($this->sampleXmlPath("rental"));
        $this->residential = simplexml_load_file($this->sampleXmlPath("residential"));
        $this->rural = simplexml_load_file($this->sampleXmlPath("rural"));
        $this->empty = simplexml_load_file($this->sampleXmlPath("empty"));
    }

    private function sampleXmlPath(string $listingType): string
    {
        return join(DIRECTORY_SEPARATOR, [
            __DIR__,
            "stubs",
            self::SAMPLE_XMLS[$listingType]
        ]);
    }

    public function test_throws_an_incorrect_node_argument_when_the_xml_passed_is_not_a_property_list(): void
    {
        $this->expectException(IncorrectNodeArgument::class);
        $xml = $this->generateXml("xmlWithIncorrectTag");

        (new ReaxmlParser())->parse($xml);
    }

    public function test_returns_the_correct_dto_class(): void
    {
        $listing = (new ReaxmlParser())->parse($this->residential);

        $this->assertInstanceOf(PropertyList::class, $listing);
    }

    public function test_property_list_is_empty_when_there_are_no_listing_types(): void
    {
        $listing = (new ReaxmlParser())->parse($this->empty);

        $this->assertEquals(true, $listing->noListings());
    }

    public function test_commercial_property_only_contains_commercial_instances(): void
    {
        $listing = (new ReaxmlParser())->parse($this->commercial);

        foreach ($listing->commercial as $commercial) {
            $this->assertInstanceOf(Commercial::class, $commercial);
        }
    }

    public function test_land_property_only_contains_land_instances(): void
    {
        $listing = (new ReaxmlParser())->parse($this->land);

        foreach ($listing->land as $land) {
            $this->assertInstanceOf(Land::class, $land);
        }
    }

    public function test_rental_property_only_contains_rental_instances(): void
    {
        $listing = (new ReaxmlParser())->parse($this->rental);

        foreach ($listing->rental as $rental) {
            $this->assertInstanceOf(Rental::class, $rental);
        }
    }

    public function test_residential_property_only_contains_residential_instances(): void
    {
        $listing = (new ReaxmlParser())->parse($this->residential);

        foreach ($listing->residential as $residential) {
            $this->assertInstanceOf(Residential::class, $residential);
        }
    }

    public function test_rural_property_only_contains_rural_instances(): void
    {
        $listing = (new ReaxmlParser())->parse($this->rural);

        foreach ($listing->rural as $rural) {
            $this->assertInstanceOf(Rural::class, $rural);
        }
    }


    /**
     * 2. Test that the "commercial" property only contains the correct listing type instances
     * 3. Test that the "holidayRental" property only contains the correct listing type instances
     * 4. Test that the "land" property only contains the correct listing type instances
     * 5. Test that the "rental" property only contains the correct listing type instances
     * 6. Test that the "residential" property only contains the correct listing type instances
     * 7. Test that the "rural" property only contains the correct listing type instances
     * 8. Test that XML with mixed listing types are parsed correctly
     */
}
