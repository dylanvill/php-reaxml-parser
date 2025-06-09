<?php

namespace AdGroup\ReaxmlParser\Nodes;

class Exclusivity
{
    const NODE_NAME = "exclusivity";

    /** Expected values: "exclusive|open" */
    public ?string $value = null;
}
