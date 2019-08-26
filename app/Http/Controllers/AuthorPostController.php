<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\District;
use App\User;
use File;

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
            'content' => 'required|min:50',
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
        $post->content = $request->content;
        $post->contact = $request->contact;
        $post->address = $request->address;
        if ($request->price == null) {
            $post->price = 'Thỏa Thuận';
        } else {
            $post->price = $request->price;
        }
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $stores = [];
            foreach ($images as $key => $image) {
                $filename = rand(111111,999999).time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/images/posts/'),$filename);
                $stores[$key] = $filename;
            }
            $saveFile = serialize($stores);
            // $stores1 = unserialize($saveFile);
            $post->image_path = $saveFile;
        }
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
            $srcs = unserialize($temp);
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
            $temp = $post->image_path;
            $srcs = unserialize($temp);
            $districts = District::all();
            return view('articles.edit',['post'=>$post,'districts'=>$districts,'user'=>$user,'srcs'=>$srcs]);
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
        // $post = Article::where('slug',$slug)->first();
        // $delFile = unserialize($post->image_path);
        //     foreach ($delFile as $file) {
        //         $file_path = public_path().'/images/posts/'.$file;
        //         echo $file_path;
        //         File::delete($file_path);
        //     }
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
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->content;
        $post->contact = $request->contact;
        $post->address = $request->address;
        $post->price = $request->price;
        $post->status = "Còn Trống";
        if ($request->hasFile('images')) {
            $delFile = unserialize($post->image_path);
            $images = $request->file('images');
            $stores = [];
            foreach ($images as $key => $image) {
                $filename = rand(111111,999999).time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/images/posts/'),$filename);
                $stores[$key] = $filename;
            }
            $saveFile = serialize($stores);
            // $stores1 = unserialize($saveFile);
            $post->image_path = $saveFile;
        }
        $post->district_id = $request->district;
        $post->save();
        $temp = $post->image_path;
        $srcs = unserialize($temp);
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
