<?php

namespace Modules\Slider\Repositories\Cache;

use Modules\Slider\Repositories\SlideRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheSlideDecorator extends BaseCacheCrudDecorator implements SlideRepository
{
    public function __construct(SlideRepository $slide)
    {
        parent::__construct();
        $this->entityName = 'slider.slides';
        $this->repository = $slide;
    }
}
