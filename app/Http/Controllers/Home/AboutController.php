<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Image;

class AboutController extends Controller
{
    //update about page
    public function aboutPage()
    {
        $aboutPage = About::find(1);
        return view('dashboard.about_page.about_page_all', compact('aboutPage'));
    }

    public function updateAbout(Request $request)
    {
        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(523, 605)->save('upload/home_about/' . $name_gen);

            $about = About::findOrFail($about_id);
            $oldImage = $about->about_image;
            if($oldImage != null){
            unlink($oldImage);
            }

            $save_url = 'upload/home_about/' . $name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url
            ]);

            $notifications = array(
                'message' => 'About page updated with image successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notifications);
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notifications = array(
                'message' => 'About page updated without image successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notifications);
        }
    }

    //about route
    public function homeAbout()
    {
        $aboutPage = About::find(1);
        return view('frontend.about_page', compact('aboutPage'));
    }

    //add multi image
    public function aboutMultiImage()
    {
        return view('dashboard.about_page.multi_image');
    }

    public function storeMultiImage(Request $request)
    {
        $images = $request->file('multi_image');
        foreach ($images as $image) {

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('upload/multi_image/' . $name_gen);
            $save_url = 'upload/multi_image/' . $name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        } //end foreach

        $notifications = array(
            'message' => 'Multi image added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.multi.image')->with($notifications);
    }

    //show multi image
    public function allMultiImage(){
        $allMultiImage = MultiImage::all();
        return view('dashboard.about_page.all_multi_image', compact('allMultiImage'));
    }

    //edit multi image
    public function editMultiImage($id){
     $multiImage = MultiImage::findOrFail($id);
     return view('dashboard.about_page.edit_multi_image',compact('multiImage'));
    }

    public function updateMultiImage(Request $request){
        $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('upload/multi_image/' . $name_gen);

            $multiImage = MultiImage::findOrFail($multi_image_id);
            $oldImage = $multiImage->multi_image;
            unlink($oldImage);

            $save_url = 'upload/multi_image/' . $name_gen;
            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url
            ]);

            $notifications = array(
                'message' => 'Multi image updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.multi.image')->with($notifications);
        }
    }

    //delete multi image
    public function deleteMultiImage($id){
        $multiImage = MultiImage::findOrFail($id);
        $oldImage = $multiImage->multi_image;
        unlink($oldImage);

        MultiImage::findOrFail($id)->delete();

        $notifications = array(
            'message' => 'Multi image deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }
}
