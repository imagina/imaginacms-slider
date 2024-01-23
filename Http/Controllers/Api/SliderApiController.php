<?php

namespace Modules\Slider\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Slider\Entities\Slider;
use Modules\Slider\Repositories\SliderRepository;

class SliderApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Slider $model, SliderRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
