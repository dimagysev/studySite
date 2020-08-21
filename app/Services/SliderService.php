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

    public function create(array $data)
    {
        $this->image = $data['img'];
        $data['img'] = $this->storeMax();
        return parent::create($data);
    }

    public function update(string $alias, array $data, bool $id = false)
    {
        if (request()->hasFile('img')){
            $this->image = $data['img'];
            $data['img'] = $this->storeMax();
        }
        return parent::update($alias, $data, $id);
    }
}
