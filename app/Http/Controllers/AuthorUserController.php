<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

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
        // $validator = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        // ]);
        // if ($validator->fails()) {
        //     return back()->withErrors($validator);
        // }
        $user = User::authUser();
        if ($user->email == $request->email) {
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->picture = $request->picture;
        $user->save();
        return redirect('home/');
            // return view('users.show',['user'=>$user]);
        } else {
        $exist = User::where('email',$request->email)->exists();
        if (!$exist) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->picture = $request->picture;
            $user->save();
            return redirect('home/');
            // return view('users.show',['user'=>$user]);
        }
        return back()->with('status', 'Email ready exist! Please enter another Email!');
        }
    }

    public function editPassword()
    {
        $user = User::authUser();
        return view('users.editPassword',['user'=>$user]);
    }

    public function updatePassword(Request $request)
    {
        // $validatorPass = $request->validate([
        //     'password' => 'required|min:6',
        //     'oldPassword' => 'required|min:6',
        //     'confirmPassword' => 'required|min:6'
        // ]);
        // if ($validatorPass->fails()) {
        //     return back()->withErrors($validatorPass);
        // }
        $user = User::authUser();
        if ($request->newPassword == $request->confirmPassword) {
            if (Hash::check($request->password, $user->password)) {
                if (!Hash::check($request->newPassword, $user->password)) {
                    $user->password = Hash::make($request->newPassword);
                    $user->save();
                    return redirect('home/');
                }
                return back()->with('status','The new password cannot be identical to the old password!!');
            }
            return back()->with('status','Password is wrong!!');
        }
        return back()->with('status','Confirm password is wrong!!');
    }

}
