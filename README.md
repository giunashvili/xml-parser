# XML Parser

XML Parser is a simple php package to parse xml in and out simply and easy.

you could:
- Parse array into xml
- Parse xml into array

### Installation

Installation is fairly simple:

```sh
$ composer require giunashvili/xml-parser
```

### Usage
-------
##### Array into XML
#
```php
use Giunashvili\XMLParser\Parse;

$arr = [ 
    'animals' => [
        'bear'      => 'black',
        'fox'       => 'red',
        'Kangaroo'  => 'Jack'
    ],
    'plants' => [
        'bamboo',
        'apple'
    ]
];

$xmlWithoutDefinedWrapper = Parse :: arrayAsXml( $arr );
echo $xmlWithoutDefinedWrapper;
/**
    <data>
        <animals>
            <bear>      black   </bear>
            <fox>       red     </fox>
            <Kangaroo>  Jack    </Kangaroo>
        </animals>
        <plants>
            <item-0>    bamboo  </item-0>
            <item-1>    bamboo  </item-1>
        </plangs>
    </data>
*/

$xmlWithDefinedWrapper    = Parse :: arrayAsXml( $arr, 'classifications' );
echo $xmlWithoutDefinedWrapper;
/**
    <classifications>
        <animals>
            <bear>      black   </bear>
            <fox>       red     </fox>
            <Kangaroo>  Jack    </Kangaroo>
        </animals>
        <plants>
            <item-0>    bamboo  </item-0>
            <item-1>    bamboo  </item-1>
        </plangs>
    </classifications>
*/

```

##### XML into Array
#
```php
use Giunashvili\XMLParser\Parse;

$xml = 
    '<data>'.
        '<animals>'.
            '<bear>'.      'black'.   '</bear>'.
            '<fox>'.       'red'.     '</fox>'.
            '<Kangaroo>'.  'Jack'.    '</Kangaroo>'.
        '</animals>'.
        '<plants>'.
            '<item-0>'.    'bamboo'.  '</item-0>'.
            '<item-1>'.    'bamboo'.  '</item-1>'.
        '</plangs>'.
    '</data>';

$arr = Parse :: xmlAsArray( $xml );
echo $arr;
/**
    [
        'classification' => [
            [ 
                'animals' => [
                    'bear'      => 'black',
                    'fox'       => 'red',
                    'Kangaroo'  => 'Jack'
                ],
                'plants' => [
                    'item-0' => 'bamboo',
                    'item-1' => 'apple'
                ]
            ]
        ]
    ]
*/
