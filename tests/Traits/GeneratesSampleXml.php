<?php

namespace AdGroup\ReaxmlParser\Tests\Traits;

use SimpleXMLElement;

trait GeneratesSampleXml
{
    private function generateXml(string $parentNodeName, array $attributes = [], array $childNodes = []): SimpleXMLElement
    {

        $parentAttributes = '';
        foreach ($attributes as $key => $value) {
            $parentAttributes .= " {$key}=\"{$value}\"";
        }

        $content = "<{$parentNodeName}{$parentAttributes}>";

        foreach ($childNodes as $node) {
            $childAttributes = '';
            foreach ($node['attributes'] as $key => $value) {
                $childAttributes .= " {$key}=\"{$value}\"";
            }
            $content .= "<{$node['name']}{$childAttributes}>{$node['value']}</{$node['name']}>";
        }
        $content .= "</{$parentNodeName}>";

        return simplexml_load_string($content);
    }
}
