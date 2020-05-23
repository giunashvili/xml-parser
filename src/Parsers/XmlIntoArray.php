<?php

namespace Giunashvili\XMLParser\Parsers;

use Giunashvili\XMLParser\Interfaces\Parser;

use SimpleXMLElement;

class XmlIntoArray implements Parser
{
  public function parse( $xml )
  {
    $xmlElement         = new SimpleXMLElement( $xml );
    $wrapperTag         = $xmlElement -> getName();
    $encodedXmlIntoJson = json_encode( $xmlElement );
    $parsedIntoArray    = json_decode( $encodedXmlIntoJson, true );

    return [ $wrapperTag => $parsedIntoArray ];
  }
}