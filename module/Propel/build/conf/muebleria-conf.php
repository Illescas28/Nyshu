<?php
// This file generated by Propel 1.7.1 convert-conf target
// from XML runtime conf file /Users/carlosesparza/Muebleria/dev/module/Propel/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'muebleria' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=10.10.10.2;dbname=muebleria',
        'user' => 'root',
        'password' => 'muebleria',
      ),
    ),
    'default' => 'muebleria',
  ),
  'generator_version' => '1.7.1',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-muebleria-conf.php');
return $conf;