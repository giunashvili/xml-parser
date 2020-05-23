<?php

use Giunashvili\XMLParser\Parser;

it( 'parses without heading', function() {

  $xml                =
    '<data>'.
      '<bear>gela</bear>'.
      '<deer>mela</deer>'. 
    '</data>';

  $expectedParsedXML  = [
    'data' => [
      'bear' => 'gela',
      'deer' => 'mela',
    ],
  ];

  $parser     = new Parser;
  $parsedXML  = $parser -> xmlToArray( $xml );


  assertEquals( $expectedParsedXML, $parsedXML );

});

it( 'parses with heading', function() {
  $xml                =
    '<?xml version="1.0" encoding="UTF-8"?>'.
    '<data>'.
      '<bear>gela</bear>'.
      '<deer>mela</deer>'. 
    '</data>';

  $expectedParsedXML  = [
    'data' => [
      'bear' => 'gela',
      'deer' => 'mela',
    ],
  ];

  $parser     = new Parser;
  $parsedXML  = $parser -> xmlToArray( $xml );

  assertEquals( $expectedParsedXML, $parsedXML );
});


it( 'parses multi-dim xml', function() {

  $xml = 
    '<data>'.
      '<animals>'.
        '<bear>black</bear>'.
        '<fox>red</fox>'.
        '<kangaroo>jack</kangaroo>'.
      '</animals>'.
      '<humans>'.
        '<jurist>helena</jurist>'.
        '<vampire>helena</vampire>'.
        '<damon-loves>helena</damon-loves>'.
      '</humans>'.
    '</data>';

  $expectedParsedXML = [
    'data' => [
      'animals' => [
        'bear'        => 'black',
        'fox'         => 'red',
        'kangaroo'    => 'jack',
      ],
      'humans'  => [
        'jurist'      => 'helena',
        'vampire'     => 'helena',
        'damon-loves' => 'helena',
      ],
    ],
  ];

  $parser = new Parser;
  $parsedXML = $parser -> xmlToArray( $xml );

  assertEquals( $expectedParsedXML, $parsedXML );
});