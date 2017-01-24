<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracast\Flash\Flash;
use App\Category;
use App\Http\Requests;
use App\Tag;
use App\Article;
use App\image;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticleRequest;



class ArticlesController extends Controller
{

    public function index(Request $request){

      $articles = Article::Search($request->get('title'))->orderBy('id', 'DESC')->paginate(5);
      $articles->each(function($articles){
        $articles->category;
        $articles->user;
      });
      return view('admin.articles.index')->with('articles', $articles);
    }

    public function create()
    {
      $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
      $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');
      return view('admin.articles.create')
          ->with('categories', $categories)
          ->with('tags', $tags);
    }

    public function store(ArticleRequest $request)
    {
      //Manipulacion de imagenes

      if ($request->file('image')) {
        $file = $request->file('image');
        $name = 'blogfacilito_' . time() . '.' . $file->getClientOriginalExtension();
        $path = public_path() . '\images\articles';
        $file->move($path, $name);
      }

      $article = new Article($request->all());
      $article->user_id = \Auth::user()->id;
      $article->save();

      $article->tags()->sync($request->tags);

      $image = new Image();
      $image->name = $name;
      $image->article()->associate($article);
      $image->save();


      flash('Se ha creado el Articulo ' . $article->title . ' de forma exitosa', 'success');
      return redirect()->route('articles.index');
    }

    public function edit($id){
      $articles = Article::find($id);
      $articles->category;
      $categories = Category::orderBy('name', 'DESC')->pluck('name', 'id');
      $tags = Tag::orderBy('name', 'DESC')->pluck('name', 'id');

      $my_tags = $articles->tags->pluck('id')->ToArray();

      return view('admin.articles.edit')
          ->with('categories', $categories)
          ->with('articles', $articles)
          ->with('tags', $tags)
          ->with('my_tags', $my_tags);
    }

    public function update(Request $request, $id){
      $articles = Article::find($id);
      $articles->fill($request->all());
      $articles->save();

      $articles->tags()->sync($request->tags);

      flash("El Articulo " . $articles->name . " Ha sido Editado de forma exitosa!", 'success')->important();
      return redirect()->route('articles.index');
    }

      public function destroy($id){
        $article = Article::find($id);
        $article->delete();
        $images = Image::find($id);
        $images->delete();

        flash("EL Articulo " . $article->name . " Ha sido eliminado de forma exitosa!", 'danger')->important();
        return redirect()->route('articles.index');
    }
}
