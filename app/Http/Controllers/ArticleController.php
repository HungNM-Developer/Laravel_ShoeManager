<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy('id','DESC')->get();
		return View('article.list',['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        // $user =  DB::table('users')->where('id', $id)->first();
        // $article = DB::table('articles')->where('id', $id)->first();
        return view('article.show_Article', ['article' => $article]);

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
        $article = Article::find($id);
        return view('article.edit_Article', ['article' => $article]);
        // $tag = DB::table('tags')->where('id', $id)->first();
        // $user =  DB::table('users')->where('id', $id)->first();
        // $article =  DB::table('articles')->where('id', $id)->first();
        // return View('article.edit_Article', ['article' => $article],['user' => $user],['tag' => $tag]);
        
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
        $article = Article::find($id);
        $article->title = $request->input('article_title');
        $article->status = $request->input('article_status');
        // $article->created_at = $request->input('article_created_at');
        // $article->updated_at = $request->input('article_updated_at');
        $article->body = $request->input('article_body');
        $article->tags->tag = $request->input('tag->tag');
        $article->save();
        return back() //trả về trang trước đó
            ->with('success', 'Article has updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
