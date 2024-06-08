<?php

namespace Modules\Slider\Transformers;

use Modules\Core\Icrud\Transformers\CrudResource;

class SlideTransformer extends CrudResource
{
  /**
  * Method to merge values with response
  *
  * @return array
  */
  public function modelAttributes($request)
  {
    return [
      'active' => $this->active ? 1 : 0,
      'imageUrl' => $this->getImageUrl()
    ];
  }
}
