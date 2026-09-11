<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSetting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;
class UserController extends Controller
{
     public function UserSettings(Request $request)
    {
        UserSetting::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'color_mode'    => $request->color_mode,
                'theme_color'   => $request->theme_color,
                'sidebar_color' => $request->sidebar_color,
                'sidebar_type'  => $request->sidebar_type,
                'sidebar_item'  => $request->sidebar_item,
                'navbar_type'   => $request->navbar_type,
            ]
        );

        return response()->json(['success' => true]);
    }

   public function getSettings()
    {
        $settings = UserSetting::where('user_id', Auth::id())->first();

        return response()->json($settings);
    }

    public function profile(){
        return view('profile'); 
    }
    public function userUpdate(Request $request){
        // dd('dsa');
        $user = Auth::user();
        $first_name = $request->input('f_name');
        $middle_name = $request->input('m_name');
        $last_name = $request->input('l_name');
        $email = $request->input('email');
        $phone_no = $request->input('phone_no');
        $location = $request->input('location');
        $username = $request->input('username');
        $password = $request->input('password');
        $new_password = $request->input('new_password'); 

        $update_info = [
            'f_name'    => $first_name,
            'm_name'   => $middle_name,
            'l_name'     => $last_name,
            'email'    => $email,
            'phone_no'      => $phone_no,
            'location'      => $location,
            'username'      => $username,
        ];

        $newPassword = $request->input('new_password');
        if(!empty($newPassword)){
            if(!Hash::check($request->input('password'), $user->password)){
                return response()->json(['message' => 'Old password is incorrect'], 400);
            }

            $update_info['password'] = Hash::make($newPassword);
        }

        $profile_update = DB::table('users')
            ->where('id', $user->id)
            ->update($update_info);

        if($profile_update > 0){
            return response()->json(['message'=>'Profile update successfully!']);
        }else{
            return response()->json(['message'=>'User not found']);
        }
    }
    public function imageUpdate(Request $request)
    {
        // dd($request->all());
        // dd($request->hasFile('image'));
        if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('profilepic'), $filename);
                $path = 'profilepic/' . $filename;
            }
            else{
                return redirect()->back()->with('error', 'Please select new image');
            }
     
        DB::table('users')
            ->where('id', $request->profilepic_id)
            ->update(['image' => $path]);
    
         return redirect()->back()->with('success', ' Profile Pic Updated successfully.');
    }
    
}
