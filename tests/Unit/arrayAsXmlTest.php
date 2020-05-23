<?php

use Giunashvili\XMLParser\Parse;

it('sets header to data if not passed', function(){

  $arr          = [
    'animal' => 'bear',
  ];

  $shouldBeXML  = 
    '<data>'.
      '<animal>bear</animal>'.
    '</data>';

  $parsedXML    = Parse :: arrayAsXml( $arr );

  assertEquals( $parsedXML, $shouldBeXML );
});

it( 'sets custom header if passed', function(){
  $arr          = [
    'animal' => 'bear',
  ];

  $shouldBeXML  = 
    '<classifications>'.
      '<animal>bear</animal>'.
    '</classifications>';

  $parsedXML    = Parse :: arrayAsXml( $arr, 'classifications' );

  assertEquals( $parsedXML, $shouldBeXML );

});

it( 'parses one-dim array', function(){
  $arr = [
    'animal' => 'bear',
    'human'  => 'George',
    'god'    => 'Jesus',
    'robot'  => 'Dolores',
  ];

  $shouldBeXML = 
    '<data>'.
      '<animal>bear</animal>'.
      '<human>George</human>'.
      '<god>Jesus</god>'.
      '<robot>Dolores</robot>'.
    '</data>';

  $parsedXML = Parse :: arrayAsXml( $arr );

  assertEquals( $parsedXML, $shouldBeXML );

});

it( 'parses multi-dim array', function() {
  
  $arr = [
    'animals' => [
      'bears' => [
        'black' => 'robert',
        'red'   => 'deniro',
      ],
      'turtle' => 'john'
    ],
  ];

  $shouldBeXML = 
    '<data>'.
      '<animals>'.
        '<bears>'.
          '<black>robert</black>'.
          '<red>deniro</red>'.
        '</bears>'.
        '<turtle>john</turtle>'.
      '</animals>'.
    '</data>';
  
  $parsedXML = Parse :: arrayAsXml( $arr );

  assertEquals( $shouldBeXML, $parsedXML );
});

it( 'parses numeric indexed array', function() {

  $arr = [
    'fox',
    'jaguar',
    'rattlesnake',
    'humans' => [
      1 => 'red',
      5 => 'black',
      8 => 'indigo',
    ],
  ];

  $shouldBeXML = 
    '<data>'.
      '<item-0>fox</item-0>'.
      '<item-1>jaguar</item-1>'.
      '<item-2>rattlesnake</item-2>'.
      '<humans>'.
        '<item-1>red</item-1>'.
        '<item-5>black</item-5>'.
        '<item-8>indigo</item-8>'.
      '</humans>'.
    '</data>';

  $parsedXML = Parse :: arrayAsXml( $arr );

  assertEquals( $shouldBeXML, $parsedXML );
});