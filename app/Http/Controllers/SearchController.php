<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\District;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function index(){
        $users = User::all();
        $articles = Article::orderBy('created_at','asc')->paginate(10);
        return view('search.index',[
            'users' => $users,
            'articles' => $articles
        ]);
    }
    public function search(Request $request){
        $users = User::all();
        $query = $request->get('search');
        if ($query == '') {
            $data = Article::paginate(10);
        } 
        else {
            $check = Article::where('address', 'like', '%' . $query . '%');
            $g = District::where('name', 'like', '%' . $query . '%')->first();
            if (strval($check->get()) != '[]') {
                $data = $check->paginate(10);
            } else {
                if (strval($g) != '') {
                    // dd($g);
                    $data = $g->articles()->paginate(10);
                }
                else{
                    return back()->with('status', 'Data Not Found!');
                }
            }
            
        }
        return view('search.search',[
            'users' => $users,
            'articles' => $data
        ]);
    }
}
