<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $posts = Article::where('user_id',$user->id)->orderBy('status','asc')->get();
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
        $validatorPost = $request->validate([
            'title' => 'required',
            'content' => 'required|min:100',
            'address' => 'required',
            'contact' =>'required',
            'district' => 'required'
        ]);
        $slug = $request->title;
        $slug = Article::slugConverter($slug);
        //save post
        $user = User::authUser();
        $post = new Article;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = Article::cutImg($request->content);
        $post->contact = $request->contact;
        $post->address = $request->address;
        if ($request->price == null) {
            $post->price = 'Thỏa Thuận';
        }
        $post->price = $request->price;
        $post->image_path = Article::getSrc($request->content);
        $post->user_id = $user->id;
        $post->district_id = $request->district;
        $post->save();
        return redirect()->route('posts.index',[$post,$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $user = User::authUser();
        $postCheck = Article::where('slug',$slug)->where('user_id',$user->id)->exists();
        if ($postCheck) {
            $post = Article::where('slug',$slug)->first();
            $temp = $post->image_path;
            $srcs = explode(' ', $temp);
            return view('articles.show',['post'=>$post,'user'=>$user,'srcs'=>$srcs]);
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
        $postCheck = Article::where('slug',$slug)->where('user_id',$user->id)->exists();
        if ($postCheck) {
            $post = Article::where('slug',$slug)->first();
            $post->status = $request->status;
            $post->save();
            return redirect('/home/posts');
        }
        return back();
    }

    public function edit($slug)
    {
        $user = User::authUser();
        $postCheck = Article::where('slug',$slug)->where('user_id',$user->id)->exists();
        if ($postCheck) {
            $post = Article::where('slug',$slug)->first();
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
        $validatorPost = $request->validate([
            'title' => 'required',
            'content' => 'required|min:50',
            'address' => 'required',
            'contact' =>'required',
            'district' => 'required'
        ]);
        $slug = $request->title;
        $slug = Article::slugConverter($slug);
        //save post
        $user = User::authUser();
        $post = Article::where('slug',$slug)->first();
        if (Article::getSrc($request->content) == null) {
            $post->title = $request->title;
            $post->slug = $slug;
            $post->content = Article::cutImg($request->content);
            $post->contact = $request->contact;
            $post->address = $request->address;
            $post->price = $request->price;
            $post->status = "Còn Trống";
            $post->district_id = $request->district;
            $post->save();
            $temp = $post->image_path;
            $srcs = explode(' ', $temp);
            return view('articles.show',['post'=>$post,'user'=>$user,'srcs'=>$srcs]);
        }
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = Article::cutImg($request->content);
        $post->contact = $request->contact;
        $post->address = $request->address;
        $post->price = $request->price;
        $post->status = "Còn Trống";
        $post->image_path = Article::getSrc($request->content);
        $post->district_id = $request->district;
        $post->save();
        $temp = $post->image_path;
        $srcs = explode(' ', $temp);
        return view('articles.show',['post'=>$post,'user'=>$user,'srcs'=>$srcs]);
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
