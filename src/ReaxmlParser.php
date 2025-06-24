<?php

namespace AdGroup\ReaxmlParser;

use AdGroup\ReaxmlParser\Dtos\PropertyList;
use SimpleXMLElement;

class ReaxmlParser
{
    /**
     * Reads a `SimpleXmlElement` object and parses it to an array that contains
     * different instances of listing types
     *
     * @param SimpleXMLElement $xml
     * @return PropertyList
     */
    public static function parse(SimpleXMLElement $xml): PropertyList
    {
        return new PropertyList();
    }
}
