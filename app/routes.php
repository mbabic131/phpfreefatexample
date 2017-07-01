<?php

// Route example
$f3->route('GET /','Controller\Foo->bar');

// Route with anonymous function
$f3->route('GET /test', function() {
    var_dump("TEST");
});

$f3->route('GET /new', 'Controller\Beer->newBeer');
$f3->route('POST @store_beer: /beer', 'Controller\Beer->storeBeer');

// Route with contoller
$f3->route('GET /about', 'Controller\About->index');

// Route with parameters
$f3->route('GET /brew/@count', function($f3) {
    echo $f3->get('PARAMS.count') . ' bottles of beer on the wall.';
});

// Named route
$f3->route('GET @beer_list: /beer', 'Controller\Beer->list');

$f3->route('GET @get_beer: /beer/@id', 'Controller\Beer->getBeer');

// Reroute
$f3->route('GET /beers', function($f3) {
    $f3->reroute('@beer_list');
});

// Display 404
$f3->route('GET /404', function($f3) {
    $f3->error(404);
});

// set global variable
$f3->set('APP_NAME', 'FreeFatApp');
// multiple varibales
$f3->mset(
    array(
        'APP_VERSION' => '0.1',
        'OWNER' => 'Miro Babić'
    )
);