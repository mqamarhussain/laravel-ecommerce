<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Traits\ImageUploadTrait;

use App\Http\Requests\Backend\StoreSliderRequest;
use App\Http\Requests\Backend\UpdateSliderRequest;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    use ImageUploadTrait;
    public $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $this->authorize('access_slider');
        $sliders = $this->slider->all();

        return view('backend.sliders.index', compact('sliders'));
    }

    public function show(Slider $slider)
    {
        $this->authorize('show_slider');

        return view('backend.sliders.show', compact('slider'));
    }

    public function create()
    {
        $this->authorize('create_slider');
        return view('backend.sliders.create');
    }

    public function store(StoreSliderRequest $request)
    {
        $this->authorize('create_slider');

        $image = NULL;
        if ($request->hasFile('image')) {
            $image = $this->uploadImage($request->title, $request->image, 'sliders', 1920, 670);
        }
        $this->slider->fill($request->validated());
        $this->slider->image = $image;
        $this->slider->save();

        clear_cache();

        return redirect()->route('admin.sliders.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Slider $slider)
    {
        $this->authorize('edit_slider');

        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $image = $slider->image;
        if ($request->has('image')) {
            if ($slider->image != null && File::exists('storage/assets/images/sliders/'. $slider->image)) {
                unlink('storage/assets/images/sliders/'. $slider->image);
            }
            $image = $this->uploadImage($request->name, $request->image, 'sliders', 1920, 670);
        }

        $slider->update([
            'title' => $request->title,
            'link' => $request->link,
            'text' => $request->text,
            'status' => $request->status,
            'image' => $image
        ]);

        Cache::forget('sliders_menu');
        Cache::forget('posts_menu');

        return redirect()->route('admin.sliders.index')->with(['message' => 'Slider updated successfully', 'alert-type' => 'success',]);
    }

    public function destroy(Slider $slider)
    {
        $this->authorize('delete_slider');

        $slider->delete();

        return redirect()->back()->with(['message' => 'Slider deleted successfully', 'alert-type' => 'success',]);
    }

    public function removeImage(Slider $slider)
    {
        $this->authorize('delete_slider');

        if (File::exists('storage/images/sliders/'. $slider->image)) {
            unlink('storage/images/sliders/'. $slider->image);
            $slider->image = null;
            $slider->save();
        }

        clear_cache();
        return back()->with([
            'message' => 'Image deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
