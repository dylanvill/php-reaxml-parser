<?php

namespace AdGroup\ReaxmlParser;

use AdGroup\ReaxmlParser\Dtos\PropertyList;
use AdGroup\ReaxmlParser\Helpers\PropertyListBuilder;
use AdGroup\ReaxmlParser\ListingTypes\Commercial;
use AdGroup\ReaxmlParser\ListingTypes\HolidayRental;
use AdGroup\ReaxmlParser\ListingTypes\Land;
use AdGroup\ReaxmlParser\ListingTypes\Rental;
use AdGroup\ReaxmlParser\ListingTypes\Residential;
use AdGroup\ReaxmlParser\ListingTypes\Rural;
use AdGroup\ReaxmlParser\Traits\HasNodeValidation;
use SimpleXMLElement;

class ReaxmlParser
{
    use HasNodeValidation;

    const ROOT_NODE = "propertyList";

    /**
     * Reads a `SimpleXmlElement` object and parses it to an array that contains
     * different instances of listing types
     *
     * @param SimpleXMLElement $xml
     * @return PropertyList
     */
    public function parse(SimpleXMLElement $xml): PropertyList
    {
        $this->validateNodeName(self::ROOT_NODE, $xml);

        $builder = new PropertyListBuilder();

        $this->setAttributes($builder, $xml);
        $this->populateListings($builder, $xml);

        return $builder->build();
    }

    private function setAttributes(PropertyListBuilder $builder, SimpleXMLElement $xml): PropertyListBuilder
    {
        $attributes = $xml->attributes();

        $builder->setDate($attributes->date)
            ->setCompanyName($attributes->companyName)
            ->setTechContactName($attributes->techContactName)
            ->setTechContactPhone($attributes->techContactPhone)
            ->setTechContactEmail($attributes->techContactEmail)
            ->setUsername($attributes->username)
            ->setPassword($attributes->password);

        return $builder;
    }

    private function populateListings(PropertyListBuilder $builder, SimpleXMLElement $xml): PropertyListBuilder
    {
        $map = $this->listingMap();

        foreach ($map as $key => $class) {
            $node = $xml->xpath($key);
            if (!empty($node)) {
                $this->parseNodesIntoBuilder($builder, $class, $node);
            }
        }

        return $builder;
    }

    /**
     * Takes a builder instance and uses it to parse the node into the correct listing type DTO.
     *
     * @param PropertyListBuilder $builder The `PropertyListBuilderInstance`.
     * @param string $class The fully qualified class name that the XML node should be instantiated into
     * @param Array<SimpleXmlElement> $listingNodes An array of the XML nodes, usually the output of the `SimpleXmlElement::xpath()` method.
     * @return PropertyListBuilder
     */
    private function parseNodesIntoBuilder(PropertyListBuilder $builder, string $class, array $listingNodes): PropertyListBuilder
    {
        foreach ($listingNodes as $node) {
            $name = $node->getName();

            /**
             * This parses the correct PropertyListBuilder method to add a listing type entry based
             * on the given node name, it will end up with a string format add[ListingType], e.g.:
             * The "residential" node name would would be the `addResidential()` method,
             * the "rural" would be, `addRural()` and so on...
             */
            $callbackName = "add" . ucwords($name);

            $instance = new $class($node);
            $builder->{$callbackName}($instance);
        }

        return $builder;
    }

    /**
     * Returns an array with a key-value pair of the listing type's XML name
     * and the listing type's associated DTO class. 
     *
     * @return Array<string,string>
     */
    private function listingMap(): array
    {
        return [
            Commercial::NODE_NAME => Commercial::class,
            HolidayRental::NODE_NAME => HolidayRental::class,
            Land::NODE_NAME => Land::class,
            Rental::NODE_NAME => Rental::class,
            Residential::NODE_NAME => Residential::class,
            Rural::NODE_NAME => Rural::class
        ];
    }
}
