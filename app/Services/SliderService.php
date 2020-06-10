<?php


namespace App\Services;


use App\Models\Slider;

class SliderService extends Service
{
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }

    public function getSlider()
    {
        return $this->model::query()->get();
    }
}
