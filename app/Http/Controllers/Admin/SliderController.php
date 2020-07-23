<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\SiteController;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use App\Services\SliderService;
use Illuminate\Http\Request;

class SliderController extends SiteController
{

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
        parent::__construct();
    }

    public function index()
    {
        $sliders = $this->sliderService->getSlider();
        $this->setData(compact('sliders'));
        return $this->renderOutput();
    }

    public function create()
    {
        return $this->renderOutput();
    }

    public function store(SliderStoreRequest $request)
    {
        if (!$this->sliderService->create($request->validated()) instanceof  Slider){
            throw new \Exception('Something wrong', 500);
        }
        return redirect()->back()->with('status', 'success');
    }

    public function edit($id)
    {
        $slide = $this->sliderService->getById($id);
        $this->setData(compact('slide'));
        return $this->renderOutput();
    }

    public function update(SliderUpdateRequest $request, $id)
    {
        if ($this->sliderService->update($id, $request->validated(),true)){
            return redirect()->back()->with('status', 'ok');
        }
        return abort(500);
    }


    public function destroy($id)
    {
        $this->sliderService->delete($id, true );
        return redirect()->back()->with('status','ok');
    }
}
