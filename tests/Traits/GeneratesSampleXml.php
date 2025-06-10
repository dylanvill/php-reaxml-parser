<?php

namespace AdGroup\ReaxmlParser\Tests\Traits;

use SimpleXMLElement;

trait GeneratesSampleXml
{
    private function generateXml(string $parentNodeName, array $childNodes): SimpleXMLElement
    {
        $content = "<{$parentNodeName}>";

        foreach ($childNodes as $key => $value) {
            $content .= "<{$key}>{$value}</{$key}>";
        }
        $content .= "</{$parentNodeName}>";

        return simplexml_load_string($content);
    }
}
