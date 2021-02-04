<?php

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;

$coord = new LatLng(['lat' => 48.43675630447701, 'lng' => 35.03410235450973]);
$map = new Map([
    'center' => $coord,
    'zoom' => 18,
    'width' => '100%',
    'height' => 550,
//    'language' => 'ru',
]);

// Lets add a marker now
$marker = new Marker([
    'position' => $coord,
    'title' => 'university',
]);

// Provide a shared InfoWindow to the marker
$marker->attachInfoWindow(
    new InfoWindow([
        'content' => '<p>D.N.U.</p>'
    ])
);

// Add marker to the map
$map->addOverlay($marker);

// Display the map -finally :)
echo $map->display();