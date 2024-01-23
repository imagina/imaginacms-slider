<?php

namespace Modules\Slider\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Slider\Entities\Slide;
use Modules\Slider\Entities\Slider;
use Modules\Slider\Http\Requests\CreateSlideRequest;
use Modules\Slider\Repositories\SlideRepository;

class SlideApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Slide $model, SlideRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
  
  /**
   * Update all slides
   * @param Request $request
   */
  public function orderSlides(Request $request)
  {
    try {
      $this->cache->tags('slides')->flush();
      if ($request->input('attributes')){
        $data = $request->input('attributes');
        $this->slideOrderer->handle(json_encode($data['slider']));
      } else {
        $this->slideOrderer->handle($request->get('slider'));
      }
      $response = ["data" => "Order Updated"];
    } catch (\Exception $e) {
      $status = 500;
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
  }
}
