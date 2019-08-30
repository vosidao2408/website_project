<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;
use App\District;
use File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::authUser();
        $articles = Article::paginate(10);
        return view('admin.articles.index', ['articles' => $articles,'user'=>$user]);
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
        return view('admin.articles.create', ['districts' => $districts,'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::authUser();
        $article = New Article;
        $title = $request->title;
        $article->title = $title;

        $slug = Article::slugConverter($title);
        $article->slug = $slug;

        $article->address = $request->address;
        $article->contact = $request->contact;
        $article->price = $request->price;

        $article->content = $request->content;

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
            $article->image_path = $saveFile;
        }
        $temp = $article->image_path;
        $srcs = unserialize($temp);
        $article->district_id = $request->district;
        $article->user_id = Auth::user()->id;

        $article->save();

        return view('admin.articles.show', ['article' => $article,'srcs' => $srcs,'user'=>$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::authUser();
        $article = Article::where('slug', $slug)->first();
        $temp = $article->image_path;
        $srcs = unserialize($temp);
        return view('admin.articles.show', ['article' => $article,'srcs' => $srcs,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = User::authUser();
        $article = Article::where('slug',$slug)->first();
        $districts = District::all();
        $temp = $article->image_path;
        $srcs = unserialize($temp);
        return view('admin.articles.edit',['article'=>$article,'districts' => $districts,'user' => $user,'srcs'=>$srcs]);
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
        $article = Article::where('slug',$slug)->first();
        $newSlug = $request->title;
        $newSlug = Article::slugConverter($newSlug);

        $user = User::authUser();
        $article->title = $request->title;
        $article->slug = $newSlug;
        $article->content = $request->content;
        $article->contact = $request->contact;
        $article->address = $request->address;
        $article->status = $request->status;
        if ($request->hasFile('images')) {
            $delFile = unserialize($article->image_path);
            foreach ($delFile as $file) {
                $file_path = public_path().'/images/posts/'.$file;
                File::delete($file_path);
            }
            $images = $request->file('images');
            $stores = [];
            foreach ($images as $key => $image) {
                $filename = rand(111111,999999).time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/images/posts/'),$filename);
                $stores[$key] = $filename;
            }
            $saveFile = serialize($stores);
            // $stores1 = unserialize($saveFile);
            $article->image_path = $saveFile;
        }
        $article->district_id = $request->district;
        $article->save();
        $temp = $article->image_path;
        $srcs = unserialize($temp);
        return view('admin.articles.show',['article' => $article,'user' => $user,'srcs' => $srcs]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::where('id', $id)->delete();
        return redirect()->route('article.index');
    }

}
