<?php
$config = array();
 
foreach (glob(__DIR__ . '/' . APPLICATION_ENV . '/*.php') as $file) {
    $config = array_replace_recursive($config, require $file);
}
 
return $config;
