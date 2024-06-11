<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  const SLIDER = 1;
  const BANNER = 2;

  /**
   * @var array
   */
  private $types = [];

  public function __construct()
  {
    $this->types = [
      [
        'id' => self::SLIDER,
        'name' => trans('slider::common.types.slider'),
        'value' => 'slider'
      ],
      [
        'id' => self::BANNER,
        'name' => trans('slider::common.types.banner'),
        'value' => 'banner'
      ],
    ];
  }

  /**
   * Get the available statuses
   * @return array
   */
  public function lists()
  {
    return $this->types;
  }

  /**
   * Get the post status
   * @param int $id
   * @return string
   */
  public function get($id)
  {
    $id --;
    if (isset($this->types[$id])) {
      return $this->types[$id];
    }
    return $this->types[0];
  }

  /**
   * Index Method To API
   */
  public function index()
  {
    //Instance response
    $response = [];
    //AMp status
    foreach ($this->types as $key => $status) {
      array_push($response, ['id' => $key, 'title' => $status]);
    }
    //Repsonse
    return collect($response);
  }
}