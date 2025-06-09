<?php

namespace AdGroup\ReaxmlParser\Exceptions;

use Exception;

class IncorrectNodeArgument extends Exception
{
    const MESSAGE = "The node is incorrect";
    
    public function __construct()
    {
        parent::__construct(self::MESSAGE);
    }
}
