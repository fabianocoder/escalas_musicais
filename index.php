<?php 
require_once "vendor/autoload.php";

use Acme\MajorChords;

$majorChors = new MajorChords();

$noteRandom = $majorChors->returnNote(rand(1, 11));
$referenceRandom = rand(2, 8);


echo "\n $noteRandom -> $referenceRandom -> ".$majorChors->returnNoteReference($noteRandom, $referenceRandom);
// print_r($majorChors->returnNoteReference($noteRandom, 5));

