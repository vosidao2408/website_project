<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use File;

class AuthorUserController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::authUser();
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        // if ($validator->fails()) {
        //     return back()->withErrors($validator);
        // }
        $user = User::authUser();
        if ($user->email == $request->email) {
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        return redirect('home/');
            // return view('users.show',['user'=>$user]);
        } else {
        $exist = User::where('email',$request->email)->exists();
        if (!$exist) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();
            return redirect('home/');
            // return view('users.show',['user'=>$user]);
        }
        return back()->with('status', 'Email của bạn đã tồn tại trên hệ thống. Phiền bạn hãy nhập email khác!!');
        }
    }

    public function editPassword()
    {
        $user = User::authUser();
        return view('users.editPassword',['user'=>$user]);
    }

    public function updatePassword(Request $request)
    {
        $validatorPass = $request->validate([
            'password' => 'required|min:6',
            'oldPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6'
        ]);
        $user = User::authUser();
        if (Hash::check($request->oldPassword, $user->password)) {
            if (!Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect('home/');
                }
                return back()->with('status','The new password cannot be identical to the old password!!');
            }
        return back()->with('status','Password is wrong!!');
        
    }

    public function avatar()
    {
        $user = User::authUser();
        return view('users.upload',['user'=>$user]);
    }

    public function avatarUpload(Request $request)
    {
        $store = User::filePath();
        $validatorImg = $request->validate([
            'avatar' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);
        $user = User::authUser();   
        $avatar = $request->file('avatar');
        $avatarname = time().'.'.$avatar->getClientOriginalExtension();
        $avatar->move(public_path('/images'),$avatarname);
        $user->image_path = $avatarname;
        $user->save();
        return back()->with('success','Avatar upload thành công')->with('path',$avatarname);
    }
}
