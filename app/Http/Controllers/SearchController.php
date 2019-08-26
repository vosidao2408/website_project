<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\District;
use App\User;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index()
    {
        $user = User::authUser();
        $articles = Article::where('status','Còn Trống')->orderBy('created_at','asc')->paginate(10);
        return view('search.index',[
            'articles' => $articles,
            'user' => $user
        ]);
    }

    public function search(Request $request){
        $user = User::authUser();
        $query = $request->get('search');
        if ($query == '') {
            $data = Article::where('status','Còn Trống')->orderBy('created_at', 'desc')->paginate(10);
        } 
        else {
            $check = Article::where('address', 'like', '%' . $query . '%');
            $g = District::where('name', 'like', '%' . $query . '%');
            if ($check->get()->isNotEmpty()) {
                $data = $check->where('status','Còn Trống')->orderBy('created_at', 'desc')->paginate(10);
            } else {
                if ($g->get()->isNotEmpty()) {
                    $data = $g->first()->articles()->where('status','Còn Trống')->orderBy('created_at', 'desc')->paginate(10);
                }
                else{
                    return back()->with('status', 'Data Not Found!');
                }
            }
            
        }
        return view('search.search',[
            'articles' => $data,
            'user' => $user
        ]);
    }

    public function show($slug)
    {
        $user = User::authUser();
        $post = Article::where('slug',$slug)->first();
        $temp = $post->image_path;
        $srcs = unserialize($temp);
        return view('search.show',[
            'post'=>$post,
            'user'=>$user,
            'srcs'=>$srcs
        ]);       
    }
   
}
