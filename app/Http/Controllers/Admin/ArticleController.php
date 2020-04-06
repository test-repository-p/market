<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::search($request->all());
        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::get();
        $categorys = Category::get();
        return view('admin.article.create',compact('tags','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(auth()->user()->id);
        $this->validate(request(),[
            'title' => 'required',
            'demo' => 'required',
            'text' => 'required',
            'category_id' => 'required',
            'tag_id.*' => 'required',
            // 'image' => 'required',
        ]);
        $id = auth()->user()->id;
        $article = Article::create([
            'title' => $request['title'],
            'demo' => $request['demo'],
            'text' => $request['text'],
            'category_id' => $request['category_id'],
            'user_id' => $id,

        ]);
        $article->tags()->sync($request->input('tag_id'));
        
        $file = $request['image'];
        $path = 'articles/';
        $image = $this->ImageUploader($file,$path);
        $photo = new Photo;
        $photo->path = $image;
        $article->photos()->save($photo);

        session()->flash('msg','ذخیره  مقاله جدید انجام شد');
        return redirect(route('article.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $tags = Tag::get();
        return view('admin.article.show',compact('article','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::get();
        $categorys = Category::get();
        return view('admin.article.edite',compact('article','tags','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate(request(),[
            'title' => 'required',
            'demo' => 'required',
            'text' => 'required',
            'category_id' => 'required',
            'tag_id.*' => 'required',
            // 'image' => 'required',
        ]);
        if($request['image'])
        {
            if($article->photos()->first())
            {
                unlink($article->photos()->first()->path) or die('Delete Error');
                $file = $request['image'];
                $path = 'articles/';
                $image = $this->ImageUploader($file,$path);
            }
            else
            {
                $file = $request['image'];
                $path = 'articles/';
                $image = $this->ImageUploader($file,$path);
                $photo = new Photo;
                $photo->path = $image;
                $article->photos()->save($photo);
            }
        }
        else
        {
            $image = $article->photos()->first()->path;
        }
        $photo = $article->photos()->first();
        $photo->path = $image;
        $photo->save();

        $article->tags()->sync($request->input('tag_id'));

        $data = $request->all();    
        $article->update($data);

        session()->flash('msg','تغییرات  مقاله انجام شد');
        return redirect(route('article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->photos()->first())
        {
            $photo = $article->photos()->first();
            unlink($article->photos()->first()->path) or die('Delete Error');
            $photo->delete();
        }
        if($article->tags()->first())
        {
            $tag = $article->tags()->first();
            $tag->delete();
        }
       
        $article->delete();
        session()->flash('msg','  مقاله موردنظر حذف شد');
        return redirect()->back();
    }
}
