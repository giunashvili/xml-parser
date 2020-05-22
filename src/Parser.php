<?php

namespace Giunashvili\XMLParser;

use Giunashvili\XMLParser\Interfaces\BaseParser;
use Giunashvili\XMLParser\Parsers\ArrayIntoXml;

class Parser implements BaseParser
{
  /**
   * Parse xml into array.
   * 
   * @param   string $xml
   * @return  array
   */
  public function xmlToArray( $xml ): array
  {
    $arr = [];

    return $arr;
  }

  /**
   * Parse xml into json.
   * 
   * @param   string $xml
   * @return  string 
   */
  public function xmlToJson( $xml ): string
  {
    $json = '';

    return $json;
  }

  /**
   * Parse array into xml.
   * 
   * @param   array $arr
   * @return  string
   */
  public function arrayToXml( $array, $wrapper = 'data' ): string
  {
    $arrayToXmlParser = new ArrayIntoXml();
    $parsedXML        = $arrayToXmlParser -> parse( $array, $wrapper );

    return $parsedXML;
  }
}