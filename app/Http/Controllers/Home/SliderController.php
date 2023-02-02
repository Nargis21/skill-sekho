<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider\SliderContent;
use App\Models\HomeSlider\SliderImage;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function sliderContent()
    {
        $sliderContents = SliderContent::all();
        return view('dashboard.home.slider_content', compact('sliderContents'));
    }

    public function sliderContentEdit($slider_id)
    {
        $sliderContent = SliderContent::find($slider_id);
        return view('dashboard.home.slider_content_edit', compact('sliderContent'));
    }

    public function sliderContentUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => "Slider Title is Required!",
            'sub_title.required' => "Slider Sub Title is Required!",
            'description.required' => "Slider Description is Required!",
        ]);

        SliderContent::findOrFail($request->id)->update([
            'category' => $request->category,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
        ]);

        $notifications = array(
            'message' => 'Slider Content Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('slider.content')->with($notifications);
    }

    public function sliderImages()
    {
        $sliderImages = SliderImage::all();
        return view('dashboard.home.slider_images', compact('sliderImages'));
    }

    public function sliderImageEdit($slider_id)
    {
        $sliderImage = SliderImage::find($slider_id);
        return view('dashboard.home.slider_image_edit', compact('sliderImage'));
    }

    public function sliderImageUpdate(Request $request)
    {
        $request->validate([
            'slider_image' => 'required'
        ], [
            'slider_image.required' => "Slider Image is Required!"
        ]);

        $slider_image_id = $request->id;
        $image = $request->file('slider_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(220, 220)->save('upload/slider_images/' . $name_gen);

        $sliderImage = SliderImage::findOrFail($slider_image_id);
        $oldImage = $sliderImage->slider_image;
        unlink($oldImage);

        $save_url = 'upload/slider_images/' . $name_gen;
        SliderImage::findOrFail($slider_image_id)->update([
            'slider_image' => $save_url
        ]);

        $notifications = array(
            'message' => 'Slider image updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('slider.images')->with($notifications);
    }
}
