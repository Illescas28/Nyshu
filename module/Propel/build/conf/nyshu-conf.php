<?php
// This file generated by Propel 1.7.1 convert-conf target
// from XML runtime conf file /Applications/AMPPS/www/NyshuZF2/dev/module/Propel/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'nyshu' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=nyshu.com.mx;dbname=nyshu',
        'user' => 'root',
        'password' => 'mysql',
      ),
    ),
    'default' => 'nyshu',
  ),
  'generator_version' => '1.7.1',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-nyshu-conf.php');
return $conf;