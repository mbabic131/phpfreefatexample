<?php 
// composer autoloader for required packages and dependencies
require_once('lib/autoload.php');

/** @var \Base $f3 */
$f3 = \Base::instance();

// F3 autoloader for application business code
$f3->set('AUTOLOAD', 'app/');

// set dubug level
$f3->set('DEBUG',3);

// load config file
$f3->config('setup.cfg');

// include routes
require_once('app/routes.php');

$f3->run();