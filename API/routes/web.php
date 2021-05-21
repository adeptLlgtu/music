<?php

 /*
 |--------------------------------------------------------------------------
 | Файл маршрутизации
 |--------------------------------------------------------------------------
 */

namespace SDFramework\Routes;
$route->before('GET', '/.*', function() {
  //
 });
$route->get('/', function() {
  echo \SDFramework\Controllers\DefaultController::welcome();
});
//GET FIELD FROM TABLE BY FIELD_VALUE
$route->get('/api/from:(\w+)', function($table) {
  echo \SDFramework\Controllers\DefaultController::get($table);
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////
$route->post('/api/registration', function() {
  echo \SDFramework\Controllers\DefaultController::registration();
});

$route->post('/api/roots', function() {
  echo \SDFramework\Controllers\DefaultController::roots();
});




?>