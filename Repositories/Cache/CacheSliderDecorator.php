<?php

namespace Modules\Slider\Repositories\Cache;

use Modules\Slider\Repositories\SliderRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheSliderDecorator extends BaseCacheCrudDecorator implements SliderRepository
{
    public function __construct(SliderRepository $slider)
    {
        parent::__construct();
        $this->entityName = 'slider.sliders';
        $this->repository = $slider;
    }

    public function findBySystemName($systemName)
    {
        return $this->remember(function ($systemName) {
            return $this->repository->findBySystemName($systemName);
        });
    }

    public function countAll()
    {
        return $this->remember(function () {
            return $this->repository->countAll();
        });
    }
}
