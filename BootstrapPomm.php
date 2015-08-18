<?php

use \PommProject\Foundation\Pomm;

$app = require __DIR__ . '/Bootstrap.php';

$pomm = $app->getServiceManager()
    ->get('pomm');

return $pomm;
