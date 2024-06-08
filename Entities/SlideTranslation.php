<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;

class SlideTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
      'title',
      'caption',
      'uri',
      'url',
      'active',
      'custom_html',
      'summary',
      'code_ads'
    ];
    protected $table = 'slider__slide_translations';
}
