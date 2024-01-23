<?php

use Illuminate\Routing\Router;

$router->group(['prefix' =>'/slider/v1'], function (Router $router) {
    $router->apiCrud([
      'module' => 'slider',
      'prefix' => 'sliders',
      'controller' => 'SliderApiController',
      'middleware' => [
        'create' => ['auth:api', 'auth-can:slider.sliders.create'],
        'index' => [], 'show' => [],
        'update' => ['auth:api', 'auth-can:slider.sliders.edit'],
        'delete' => ['auth:api', 'auth-can:slider.sliders.destroy'],
      ],
       'customRoutes' => [ // Include custom routes if needed
        [
          'method' => 'post', // get,post,put....
          'path' => '/order-slides', // Route Path
          'uses' => 'orderSlides', //Name of the controller method to use
          'middleware' => ['auth:api'] // if not set up middleware, auth:api will be the default
        ]
       ]
    ]);
    $router->apiCrud([
      'module' => 'slider',
      'prefix' => 'slides',
      'controller' => 'SlideApiController',
      'middleware' => [
        'create' => ['auth:api', 'auth-can:slider.slides.create'],
        'index' => [], 'show' => [],
        'update' => ['auth:api', 'auth-can:slider.slides.edit'],
        'delete' => ['auth:api', 'auth-can:slider.slides.destroy'],
      ],// 'customRoutes' => [ // Include custom routes if needed
      //  [
      //    'method' => 'post', // get,post,put....
      //    'path' => '/some-path', // Route Path
      //    'uses' => 'ControllerMethodName', //Name of the controller method to use
      //    'middleware' => [] // if not set up middleware, auth:api will be the default
      //  ]
      // ]
    ]);
  
  
  $router->apiCrud([
    'module' => 'slider',
    'prefix' => 'status-types',
    'staticEntity' => 'Modules\Slider\Entities\Type'
  ]);
// append


});
