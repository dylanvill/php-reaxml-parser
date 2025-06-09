<?php

namespace AdGroup\ReaxmlParser\Nodes;

use SimpleXMLElement;

class HolidayCategory
{
    const NODE_NAME = "holidayCategory";
    
    /** 
     * Expected values:
     * 
     * "Alpine|Unit|ServicedApartment|House|Terrace|Flat
     * Studio|Villa|Townhouse|Apartment|DuplexSemi-detached
     * Retreat|BackpackerHostel|Campground|CaravanHolidayPark
     * FarmStay|HouseBoat|Hotel|Motel|Lodge|ExecutiveRental
     * BedAndBreakfast|Resort|SelfContainedCottage|Other"
     */
    public ?string $name = null;

    public function __construct(SimpleXMLElement $node) {}
}
