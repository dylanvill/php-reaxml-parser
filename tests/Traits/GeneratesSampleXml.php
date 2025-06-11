<?php

namespace AdGroup\ReaxmlParser\Tests\Traits;

use SimpleXMLElement;

trait GeneratesSampleXml
{

    /**
     * Generates a dummy / test XML.
     *
     * @param string $parentNodeName The name of the root node of the XML.
     * @param array $attributes The attributes of the root node.
     * @param array $childNodes An array of arrays with the following keys:
     * - `name` Name of the node
     * - `value` The value of the node, can be an array with the same format 
     * - `attributes` The attributes of the node
     * @return SimpleXMLElement
     */
    private function generateXml(string $parentNodeName, array $attributes = [], array $childNodes = []): SimpleXMLElement
    {

        $parentAttributes = $this->parseAttributes($attributes);

        $content = "<{$parentNodeName}{$parentAttributes}>";

        foreach ($childNodes as $node) {
            $content .= $this->parseChildNode($node);
        }

        $content .= "</{$parentNodeName}>";

        return simplexml_load_string($content);
    }

    private function parseChildNode(array $node): string
    {
        $name = $node['name'];
        $attributes = $this->parseAttributes($node['attributes'] ?? []);
        $value = $node['value'];

        if (is_array($value) && isset($value['name'], $value['value'])) {
            $value = $this->parseChildNode($value);
        }

        return "<{$name}{$attributes}>{$value}</{$name}>";
    }

    private function parseAttributes(array $attributes): string
    {
        $parsedAttribute = '';
        foreach ($attributes as $key => $value) {
            $parsedAttribute .= " {$key}=\"{$value}\"";
        }

        return $parsedAttribute;
    }
}
