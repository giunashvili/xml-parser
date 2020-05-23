<?php

function oneDimArray()
{
  return [
    'animal' => 'bear',
    'human'  => 'George',
    'god'    => 'Jesus',
    'robot'  => 'Dolores',
  ];
}

function dieAndDump( $var )
{
  var_dump( $var );
  die;
}