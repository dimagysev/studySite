<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Slider extends Component
{
    public $slider;

    /**
     * Create a new component instance.
     *
     * @param $slider
     */
    public function __construct($slider)
    {
        //
        $this->slider = $slider;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.pinc.build-slider.slider');
    }

    public function buildSlider($slider)
    {
        $view = '';
        foreach ($slider as $slide)
        {
            $view .= view('components.pinc.build-slider.slide')
                ->with('slide', $slide)
                ->render();
        }
        return $view;
    }


}
