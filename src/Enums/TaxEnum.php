<?php

namespace AdGroup\ReaxmlParser\Enums;

enum TaxEnum: string
{
    case UNKNOWN = "unknown";
    case EXEMPT = "exempt";
    case INCLUSIVE = "inclusive";
    case EXCLUSIVE = "exclusive";
}
