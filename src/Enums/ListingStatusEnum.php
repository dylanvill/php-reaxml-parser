<?php

namespace App\ReaXml\Enums;

enum ListingStatusEnum: string
{
    case CURRENT = "current";
    case WITHDRAWN = "withdrawn";
    case SOLD = "sold";
    case OFFMARKET = "offmarket";
    case LEASED = "leased";
    case DELETED = "deleted";
}
