<?php


namespace App\Services;


use App\Models\Slider;

class SliderService extends Service
{
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
       // $this->maxHeight = 483;
//        $this->maxWidth = 1105;
    }

    public function getSlider()
    {
        return $this->model::query()->get();
    }
}
