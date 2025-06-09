<?php

namespace AdGroup\ReaxmlParser\Nodes;

class Presentation
{
    const NODE_NAME = "presentation";

    /** Expected values: "enhanced|premium|elite" */
    public ?string $style = null;
    /** Expected values: "30|90|180|365" */
    public ?int $duration = null;
}
