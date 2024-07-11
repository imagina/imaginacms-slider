<?php

namespace Modules\Slider\Repositories;

use Modules\Core\Icrud\Repositories\BaseCrudRepository;

interface SliderRepository extends BaseCrudRepository
{
    public function countAll();
}
