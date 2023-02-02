<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    public function homeBanner()
    {
        $homeBanner = HomeBanner::find(1);
        return view('dashboard.home.home_banner', compact('homeBanner'));
    }

    public function updateBanner(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_title' => 'required',
            'video_url' => 'required',
        ], [
            'title.required' => "Banner Title is Required!",
            'short_title.required' => "Banner Short Title is Required!",
            'video_url.required' => "Banner Video URL is Required!",
        ]);

        $slide_id = $request->id;

        if ($request->file('banner_image')) {
            $image = $request->file('banner_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(650, 650)->save('upload/banner_image/' . $name_gen);

            $homeSlide = HomeBanner::findOrFail($slide_id);
            $oldImage = $homeSlide->banner_image;
            if ($oldImage != null) {
                unlink($oldImage);
            }

            $save_url = 'upload/banner_image/' . $name_gen;

            HomeBanner::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'banner_image' => $save_url
            ]);

            $notifications = array(
                'message' => 'Home Banner Updated With Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notifications);
        } else {
            HomeBanner::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url
            ]);

            $notifications = array(
                'message' => 'Home Banner Updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notifications);
        }
    }
}
