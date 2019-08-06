<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Article;
use App\District;
use App\User;

class AuthorPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $user = User::authUser(); 
        $posts = Article::where('id_user',$user->id)->orderBy('status','asc')->get();
        return view('articles.index',['posts'=>$posts,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::authUser(); 
        $districts = District::all();
        return view('articles.create',['districts'=>$districts,'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = $request->title;
        $slug = Article::slugConverter($slug);
        //save post
        $user = User::authUser();
        $post = new Article;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->content;
        $post->contact = $request->contact;
        $post->address = $request->address;
        $post->price = $request->price;
        $post->image_path = "something";
        $post->id_user = Auth::user()->id;
        $post->id_district = $request->district;
        $post->save();
        return redirect()->route('posts.index',[$post,$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $user = User::authUser();
        $post = Article::where('slug',$slug)->first();
        if ($post->id_user == $user->id) {
            return view('articles.show',['post'=>$post,'user'=>$user]);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $slug) 
    {
        $user = User::authUser();
        $post = Article::where('slug',$slug)->first();
        if ($post->id_user == $user->id) {
            $post->status = $request->status;
            $post->save();
            return redirect('/home/posts');
        }
        return back();
    }

    public function edit($slug)
    {
        $user = User::authUser();
        $post = Article::where('slug',$slug)->first();
        if ($post->id_user == $user->id) {
            $districts = District::all();
            return view('articles.edit',['post'=>$post,'districts'=>$districts,'user'=>$user]);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $slug = $request->title;
        $slug = Article::slugConverter($slug);
        //save post
        $user = User::authUser();
        $post = Article::where('slug',$slug)->first();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->content;
        $post->contact = $request->contact;
        $post->address = $request->address;
        $post->status = "Còn Trống";
        $post->id_district = $request->district;
        $post->save();
        return view('articles.show',['post'=>$post,'user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Article::where('slug',$slug)->delete();
        return redirect()->route('posts.index');
    }
}
