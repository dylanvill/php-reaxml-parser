<?php

namespace AdGroup\ReaxmlParser\Tests;

use AdGroup\ReaxmlParser\Dtos\PropertyList;
use AdGroup\ReaxmlParser\Exceptions\IncorrectNodeArgument;
use AdGroup\ReaxmlParser\ListingTypes\Residential;
use AdGroup\ReaxmlParser\ReaxmlParser;
use AdGroup\ReaxmlParser\Tests\Traits\GeneratesSampleXml;
use Orchestra\Testbench\PHPUnit\TestCase;
use SimpleXMLElement;

class ReaxmlParserTest extends TestCase
{
    use GeneratesSampleXml;

    const SAMPLE_XMLS = [
        "residential" => "residential_sample.xml",
        "empty" => "empty_sample.xml"
    ];

    private SimpleXMLElement $residential;
    private SimpleXMLElement $empty;

    public function setUp(): void
    {
        parent::setUp();

        $this->residential = simplexml_load_file($this->sampleXmlPath("residential"));
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

    public function test_residential_property_only_contains_residential_instances(): void
    {
        $listing = (new ReaxmlParser())->parse($this->residential);

        foreach ($listing->residential as $residential) {
            $this->assertInstanceOf(Residential::class, $residential);
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
