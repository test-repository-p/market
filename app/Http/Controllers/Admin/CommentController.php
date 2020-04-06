<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = Comment::search($request->all());
        return view('admin.comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        $articles = Article::get();
        return view('admin.comment.create',compact('products','articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'comment' => 'required',
            // 'product_id' => 'required',
            // 'article_id' => 'required',

        ]);
        $id = auth()->user()->id;
        $comment = Comment::create([
            'comment' => $request['comment'],
            'user_id' => $id,

        ]);
        if($request['product_id'])
        {
            $comment->products()->sync($request->input('product_id'));

        }
        elseif($request['article_id'])
        {
            $comment->articles()->sync($request->input('article_id'));

        }
      

        session()->flash('msg','ذخیره  کامنت جدید انجام شد');
        return redirect(route('comment.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('admin.comment.show',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $products = Product::get();
        $articles = Article::get();
        return view('admin.comment.edite',compact('comment','products','articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->validate(request(),[
            'comment' => 'required',
            // 'product_id' => 'required',
            // 'article_id' => 'required',
          
        ]);
       
        $comment->products()->sync($request->input('commentable_id'));

      
        $data = $request->all();    
        $comment->update($data);

        session()->flash('msg','تغییرات  کامنت انجام شد');
        return redirect(route('comment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        
        $comment->delete();
        session()->flash('msg','  کامنت موردنظر حذف شد');
        return redirect()->back();
    }
}
