<?php

namespace AdGroup\ReaxmlParser\Helpers;

use AdGroup\ReaxmlParser\Dtos\PropertyList;
use AdGroup\ReaxmlParser\ListingTypes\Commercial;
use AdGroup\ReaxmlParser\ListingTypes\HolidayRental;
use AdGroup\ReaxmlParser\ListingTypes\Land;
use AdGroup\ReaxmlParser\ListingTypes\Rental;
use AdGroup\ReaxmlParser\ListingTypes\Residential;
use AdGroup\ReaxmlParser\ListingTypes\Rural;

class PropertyListBuilder
{

    private ?string $date = null;
    private ?string $companyName = null;
    private ?string $techContactName = null;
    private ?string $techContactPhone = null;
    private ?string $techContactEmail = null;
    private ?string $username = null;
    private ?string $password = null;

    private array $commercial = [];
    private array $holidayRental = [];
    private array $land = [];
    private array $rental = [];
    private array $residential = [];
    private array $rural = [];

    public function setDate(?string $value): self
    {
        $this->date = $value;
        return $this;
    }
    public function setCompanyName(?string $value): self
    {
        $this->companyName = $value;
        return $this;
    }
    public function setTechContactName(?string $value): self
    {
        $this->techContactName = $value;
        return $this;
    }
    public function setTechContactPhone(?string $value): self
    {
        $this->techContactPhone = $value;
        return $this;
    }
    public function setTechContactEmail(?string $value): self
    {
        $this->techContactEmail = $value;
        return $this;
    }
    public function setUsername(?string $value): self
    {
        $this->username = $value;
        return $this;
    }
    public function setPassword(?string $value): self
    {
        $this->password = $value;
        return $this;
    }

    public function addCommercial(Commercial $listing): self
    {
        $this->commercial[] = $listing;
        return $this;
    }

    public function addHolidayRental(HolidayRental $listing): self
    {
        $this->holidayRental[] = $listing;
        return $this;
    }

    public function addLand(Land $listing): self
    {
        $this->land[] = $listing;
        return $this;
    }

    public function addRental(Rental $listing): self
    {
        $this->rental[] = $listing;
        return $this;
    }

    public function addResidential(Residential $listing): self
    {
        $this->residential[] = $listing;
        return $this;
    }

    public function addRural(Rural $listing): self
    {
        $this->rural[] = $listing;
        return $this;
    }

    public function build(): PropertyList
    {
        return new PropertyList(
            date: $this->date,
            companyName: $this->companyName,
            techContactName: $this->techContactName,
            techContactPhone: $this->techContactPhone,
            techContactEmail: $this->techContactEmail,
            username: $this->username,
            password: $this->password,
            commercial: $this->commercial,
            holidayRental: $this->holidayRental,
            land: $this->land,
            rental: $this->rental,
            residential: $this->residential,
            rural: $this->rural,
        );
    }
}
