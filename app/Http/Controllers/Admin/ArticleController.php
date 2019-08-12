<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;
use App\District;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('admin.articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::all();
        return view('admin.articles.create', ['districts' => $districts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        function cutImg($a)
        {
            $time = substr_count($a, 'img');
            $find = strstr($a, '<img');
            $f = $a;
            for ($i=0; $i < $time; $i++) {
                $k = strstr($f, '<img');
                $last = strstr($k,'>', true);
                $z = $last.'>';
                $f = str_replace($z,'', $f);
            }
            return $f;
        }

        function getSrc($a)
        {
            $b = explode(' ', $a);
            $c = count($b);
            $find = array();
            $j = 0;
            for ($i=0; $i < $c; $i++) {
                $d = 'src';
                $check = strpos($b[$i], $d);
                if ($check !== false) {
                $find[$j] = $b[$i];
                $j = $j + 1;
                }
            }
            $u = ['src="','"'];
            $f = ['',''];
            $g = str_replace($u, $f, $find);
            $image = implode(' ', $g);
            return $image;
        }

        $article = New Article;
        $title = $request->title;
        $article->title = $title;

        $slug = Str::slug($title,'-');
        $article->slug = $slug;

        $article->address = $request->address;
        $article->contact = $request->contact;
        $article->price = $request->price;

        $a = $request->content;
        $article->content = cutImg($a);

        $b = getSrc($a);
        $srcs = explode(' ', $b);

        $article->image_path = getSrc($a);

        $article->district_id = $request->district;
        $article->user_id = Auth::user()->id;

        $article->save();

        return view('admin.articles.show', ['article' => $article, 'srcs' => $srcs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $temp = $article->image_path;
        $srcs = explode(' ', $temp);
        return view('admin.articles.show', ['article' => $article, 'srcs' => $srcs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
