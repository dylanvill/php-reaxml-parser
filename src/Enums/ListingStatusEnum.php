<?php

namespace AdGroup\ReaxmlParser\Enums;

enum ListingStatusEnum: string
{
    case CURRENT = "current";
    case WITHDRAWN = "withdrawn";
    case SOLD = "sold";
    case OFFMARKET = "offmarket";
    case LEASED = "leased";
    case DELETED = "deleted";
}
