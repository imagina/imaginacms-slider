<?php

namespace Modules\Slider\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateSliderRequest extends BaseFormRequest
{
  public function rules()
  {
    return [
      'name' => 'required'
    ];
  }

  public function authorize()
  {
    return true;
  }

  public function messages()
  {
    return [
      'name.required' => trans('slider::validation.name is required'),
      'system_name.required' => trans('slider::validation.system name is required')
    ];
  }

  public function getValidator()
  {
    return $this->getValidatorInstance();
  }
}
