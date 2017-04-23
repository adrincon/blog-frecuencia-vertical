<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use Carbon\Carbon;
use App\Category;
use App\Tag;

class FrontController extends Controller
{

    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
      $articles = Article::orderBy('id', 'DESC')->paginate(2);
      $articles->each(function($articles){
        $articles->category;
        $articles->images;
      });

      return view('front.index')
          ->with('articles', $articles);
    }

    public function searchCategory($name)
    {
      $category = Category::searchCategory($name)->first();
      $articles = $category->articles()->paginate(4);
      $articles->each(function($articles){
        $articles->category;
        $articles->images;
      });
      return view('front.index')->with('articles', $articles);
    }

    public function searchTag($name)
    {
      $tag = Tag::searchTag($name)->first();
      $articles = $tag->articles()->paginate(4);
      $articles->each(function($articles){
        $articles->category;
        $articles->images;
      });

      return view('front.index')
        ->with('articles', $articles);
    }

    public function viewArticle($slug)
    {
      $article = Article::findBySlugOrFail($slug);
      $article->category;
      $article->user;
      $article->tags;
      $article->image;

      return view('front.article')->with('article', $article);
    }

}
