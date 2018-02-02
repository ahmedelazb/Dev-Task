<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$tripSorter   = new TripSorter\TripCardsSorter();
$journey_desc = $tripSorter->buildJourney();

echo "......Check Below Journey You Will Take......";
echo  $journey_desc ;
