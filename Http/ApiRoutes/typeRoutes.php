<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => 'slider-types'], function (Router $router) {

  $router->get('/', [
    'as' => 'api.slider.sliderTypes.index',
    'uses' => 'SliderApiController@index',
    'middleware' => ['auth:api']
  ]);

});
