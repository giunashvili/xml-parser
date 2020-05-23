<?php

namespace Giunashvili\XMLParser;

use Giunashvili\XMLParser\Interfaces\BaseParser;

use Giunashvili\XMLParser\Parsers\ArrayIntoXml;
use Giunashvili\XMLParser\Parsers\XmlIntoArray;

class Parse
{
  /**
   * Parse xml into array.
   * 
   * @param   string $xml
   * @return  array
   */
  public static function xmlAsArray( $xml ): array
  {
    $xmlToArrayParser = new XmlIntoArray();
    $arr              = $xmlToArrayParser -> parse( $xml );

    return $arr;
  }

  /**
   * Parse array into xml.
   * 
   * @param   array $arr
   * @return  string
   */
  public static function arrayAsXml( $array, $wrapper = 'data' ): string
  {
    $arrayToXmlParser = new ArrayIntoXml();
    $parsedXML        = $arrayToXmlParser -> parse( $array, $wrapper );

    return $parsedXML;
  }
}