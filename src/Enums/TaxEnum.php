<?php

namespace App\ReaXml\Enums;

enum TaxEnum: string
{
    case UNKNOWN = "unknown";
    case EXEMPT = "exempt";
    case INCLUSIVE = "inclusive";
    case EXCLUSIVE = "exclusive";
}
