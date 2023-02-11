<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notifications = array(
            'message' => 'Successfully Logout!',
            'alert-type' => 'success'
          );

        return redirect('/home')->with($notifications);
    }

    public function profile(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('user.profile_view', compact('userData'));
    }

    public function editProfile(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('user.profile_edit', compact('userData'));
    }

    public function storeProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name  = $request->name;
        $data->email  = $request->email;
        $data->username  = $request->username;
        $oldImg = $data->profile_image;

        if($request->file('profile_image')){
           
                $file = $request->file('profile_image');
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/profile_images'),$fileName);
               
                if($oldImg != null){
                $oldPath = 'upload/profile_images/'.$oldImg;
                unlink($oldPath);
        }
                $data['profile_image'] = $fileName;
           
        }
        $data->save();

        $notifications = array(
          'message' => 'Profile Updated Successfully',
          'alert-type' => 'info'
        );
        return redirect()->route('profile')->with($notifications);
    }

    public function changePassword(){
        return view('user.change_password');
    }

    public function updatePassword(Request $request){

        $validateData = $request->validate([
         'oldPassword' => 'required',
         'newPassword' => 'required',
         'confirmPassword' => 'required|same:newPassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldPassword, $hashedPassword)){
        
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newPassword);
            $users->save();

            session()->flash('message','Password Updated successfully!');
            return redirect()->back();
        }
        else{
            return redirect()->back()->with('password_change','Old Password is not match!');
        } 
    }

    public function users(){
        $users = User::where('email_verified_at', '!=', null)->get();
        return view('dashboard.users.users', compact('users'));
    }

    public function makeAdmin($user_id){
        User::findOrFail($user_id)->update([
            'role' => '2'
        ]);

        $notifications = array(
            'message' => 'Made Admin Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('users')->with($notifications);
    }

    public function removeAdmin($user_id){
        User::findOrFail($user_id)->update([
            'role' => '1'
        ]);

        $notifications = array(
            'message' => 'Removed Admin Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('users')->with($notifications);
    }
}
