<?php

namespace Giunashvili\XMLParser\Parsers;

use Giunashvili\XMLParser\Interfaces\Parser;
use SimpleXMLElement;

class ArrayIntoXml implements Parser
{
  /**
   * parse array into xml.
   * 
   * @param   array   $arr
   * @param   string $wrapper
   * @return  string
   */
  public function parse( $arr, $wrapper = 'data' )
  {
    $xml = new SimpleXMLElement('<'. $wrapper .'/>');
    $this -> parserDFS( $arr, $xml );

    $xml = $this -> stripVersionHeading( $xml );    

    return $xml;
  }

  /**
   * Dfs function to traverse the
   * array and create SimpleXMLElement object.
   * 
   * @param   array $arr
   * @param   SimpleXMLElement $xml
   * @return  void
   */
  private function parserDFS( array $arr, SimpleXMLElement &$xml )
  {
    foreach( $arr as $key => $value )
    {
      if( is_numeric( $key ) )
      {
        $key = 'item-' . $key;
      }

      if( is_array( $value ) )
      {
        $newXml = $xml -> addChild( $key );
        
        $this -> parserDFS($value, $newXml );
      }
      else
      {
        $newXml = $xml -> addChild( $key, $value );
      }
    }
  }

  /**
   * Strip xml version heading.
   * 
   * @param  SimpleXMLElement $xml
   * @return string
   */
  private function stripVersionHeading(SimpleXMLElement $xml )
  {
    $dom = dom_import_simplexml( $xml );
    
    $documentElement = $dom -> ownerDocument -> documentElement;
    $strippedXML = $dom  
      -> ownerDocument
      -> saveXML( $documentElement );

    return $strippedXML;
  }
      
}