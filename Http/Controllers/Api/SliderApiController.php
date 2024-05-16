<?php

namespace Modules\Slider\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Slider\Entities\Slider;
use Modules\Slider\Repositories\SliderRepository;
use Illuminate\Http\Request;
use Modules\Core\Icrud\Transformers\CrudResource;

class SliderApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  private $slideOrderer;

  public function __construct(Slider $model, SliderRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
    $this->slideOrderer = app("Modules\Slider\Services\SlideOrderer");
  }

  /**
   * Controller to create model
   *
   * @param Request $request
   * @return mixed
   */
  public function create(Request $request)
  {
    \DB::beginTransaction();
    try {
      //Get model data
      $modelData = $request->input('attributes') ?? [];

      //Validate Request
      if (isset($this->model->requestValidation['create'])) {
        $this->validateRequestApi(new $this->model->requestValidation['create']($modelData));
      }

      //instance the system_name from name
      $name = strtolower(str_replace(" ", "_", $modelData['name']));
      $modelData['system_name'] = uniqid($name."_type"."_".$modelData["type"] ?? ""."_");

      //Create model
      $model = $this->modelRepository->create($modelData);

      //Response
      $response = ["data" => CrudResource::transformData($model)];
      \DB::commit(); //Commit to Data Base
    } catch (\Exception $e) {
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["messages" => [["message" => $e->getMessage(), "type" => "error"]]];
    }
    //Return response
    return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
  }

  /*
  * Update all slides
  * @param Request $request
  */
  public function orderSlides(Request $request)
  {
    try {
      
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
