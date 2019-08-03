<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class AuthorUserController extends Controller
{
    public function index()
    {
        //
        $email = Auth::user()->email;
        $user = User::where('email',$email)->first();
        return view('users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $email = Auth::user()->email;
        $user = User::where('email',$email)->first();
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
        $email = Auth::user()->email;
        $user = User::where('email',$email)->first();
        if ($user->email == $request->email) {
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->save();
            return view('users.show',['user'=>$user]);
        } else {
            $exist = User::where('email',$request->email)->exists();
            if (!$exist) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                return view('users.show',['user'=>$user]);
            }
            return back()->with('status', 'Email ready exist! Please enter another Email!');
        }
    }

}
