<?php

namespace AdGroup\ReaxmlParser\Dtos;

class PropertyList
{
    public array $commercial = [];
    public array $holidayRental = [];
    public array $land = [];
    public array $rental = [];
    public array $residential = [];
    public array $rural = [];

    public function noListings(): bool
    {
        return empty($commercial) &&
            empty($holidayRental) &&
            empty($land) &&
            empty($rental) &&
            empty($residential) &&
            empty($rural);
    }
}
