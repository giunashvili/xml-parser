<?php

namespace Giunashvili\XMLParser\Interfaces;

interface BaseParser
{
  /**
   * Parse xml into array.
   * 
   * @param   string $xml
   * @return  array
   */
  function xmlToArray( $xml ): array;

  /**
   * Parse xml into json.
   * 
   * @param   string $xml
   * @return  string 
   */
  function xmlToJson( $xml ): string;

  /**
   * Parse array into xml.
   * 
   * @param   array $arr
   * @return  string
   */
  function arrayToXml( $array, $wrapperTag = 'data' ): string;
}