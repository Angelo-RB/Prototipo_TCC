<?php

/**
*
* Autoloader
* 
*
**/

/**
*
* Pastas onde as classes serão adicionadas.
* OBS: Para suporte de uma nova pasta adicione no array.
*
**/
$paths = array(
  'controllers',
  'controllers/site',
  'controllers/users',
  'controllers/scheduling',
  'helpers',
  'models',
  'models/db',
  'models/user',
  'models/eventSchedule'
);

/**
*
* Registrando o autoloader
*
**/

spl_autoload_register(function($classname) use ($paths){

  $found = false;

  foreach($paths as $path){

    $file = $path . DIRECTORY_SEPARATOR . $classname . '.php';

    if(file_exists($file)){
      require $file;
      $found = true;
      break;
    }

  }

  if(!$found){
    exit('Class ' . $classname . ' not found.');
  }

});