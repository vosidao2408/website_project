<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Article;
use App\District;

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
        $id = Auth::user()->id;
        $posts = Article::where('id_user',$id)->get();
        return view('articles.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
        return view('articles.create',['districts'=>$districts]);
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
        $slug = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $slug);
		$slug = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $slug);
		$slug = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $slug);
		$slug = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $slug);
		$slug = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $slug);
		$slug = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $slug);
		$slug = preg_replace("/(đ)/", 'd', $slug);
		$slug = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $slug);
		$slug = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $slug);
		$slug = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $slug);
		$slug = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $slug);
		$slug = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $slug);
		$slug = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $slug);
		$slug = preg_replace("/(Đ)/", 'D', $slug);
		$slug = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $slug);
        $slug = preg_replace("/( )/", '-', $slug);
        //save post
        $post = new Article;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->content;
        $post->contact = $request->contact;
        $post->address = $request->address;
        $post->image_path = "something";
        $post->id_user = Auth::user()->id;
        $post->id_district = $request->district;
        $post->save();
        return redirect()->route('posts.index',[$post]);
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
        $post = Article::where('slug',$slug)->first();
        if ($post->id_user == Auth::user()->id) {
            $district = District::where('id',$post->id_district)->first();
            return view('articles.show',['post'=>$post,'district'=>$district]);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Article::where('slug',$slug)->first();
        if ($post->id_user == Auth::user()->id) {
            $districts = District::all();
            return view('articles.edit',['post'=>$post,'districts'=>$districts]);
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
        $slug = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $slug);
		$slug = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $slug);
		$slug = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $slug);
		$slug = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $slug);
		$slug = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $slug);
		$slug = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $slug);
		$slug = preg_replace("/(đ)/", 'd', $slug);
		$slug = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $slug);
		$slug = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $slug);
		$slug = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $slug);
		$slug = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $slug);
		$slug = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $slug);
		$slug = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $slug);
		$slug = preg_replace("/(Đ)/", 'D', $slug);
		$slug = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $slug);
        $slug = preg_replace("/( )/", '-', $slug);
        //save post
        $post = Article::where('slug',$slug)->first();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->content;
        $post->contact = $request->contact;
        $post->address = $request->address;
        $post->id_district = $request->district;
        $post->save();
        $district = District::where('id',$post->id_district)->first();
        return view('articles.show',['post'=>$post,'district'=>$district]);
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
