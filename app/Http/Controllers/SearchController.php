<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\District;

class SearchController extends Controller
{
    public function index(){
        $articles = Article::orderBy('created_at','asc')->paginate(10);
        return view('search.index',[
            'articles' => $articles
        ]);
    }
    public function search(Request $request){
        $query = $request->get('search');
        if ($query == '') {
            $data = Article::paginate(10);
        } 
        else {
            $check = Article::where('address', 'like', '%' . $query . '%');
            $g = District::where('name', 'like', '%' . $query . '%');
            if ($check->get()->isNotEmpty()) {
                $data = $check->paginate(10);
            } else {
                if ($g->get()->isNotEmpty()) {
                    $data = $g->first()->articles()->paginate(10);
                }
                else{
                    return back()->with('status', 'Data Not Found!');
                }
            }
            
        }
        return view('search.search',[
            'articles' => $data
        ]);
    }
    public function show($slug){
        $article = Article::where('slug',$slug)->first();
        return view('search.show',[
            'article' => $article
        ]);
    }
}
