<?php

namespace AdGroup\ReaxmlParser\Nodes;

use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use AdGroup\ReaxmlParser\Traits\HasText;
use SimpleXMLElement;

class HolidayCategory
{
    const NODE_NAME = "holidayCategory";

    use HasText, HasNodeValidation;

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


    public function __construct(SimpleXMLElement $node)
    {
        $this->validateNodeName(self::NODE_NAME, $node);
        $this->assignNodeToText($node);

        $attributes = $node->attributes();
        $this->name = empty($attributes->name) ? null : $attributes->name->__toString();
    }
}
