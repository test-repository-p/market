<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Product;
use App\User;
use Validator,Redirect,Response;
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
        $products = Product::get();
        $articles = Article::get();
        $comments = Comment::orderBy('id','desc')->paginate(5);
        return view('admin.comment.comment',compact('comments','products','articles'));
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
        // $this->validate(request(),[
        //     'comment' => 'required',
        //     // 'product_id' => 'required',
        //     // 'article_id' => 'required',

        // ]);
        // $id = auth()->user()->id;
        // $comment = Comment::create([
        //     'comment' => $request['comment'],
        //     'user_id' => $id,

        // ]);
        // if($request['product_id'])
        // {
        //     $comment->products()->sync($request->input('product_id'));

        // }
        // elseif($request['article_id'])
        // {
        //     $comment->articles()->sync($request->input('article_id'));

        // }
      

        // session()->flash('msg','ذخیره  کامنت جدید انجام شد');
        // return redirect(route('comment.index'));
        
        $validator = Validator::make($request->all(), [
			'comment' => 'required|string',
			'product_id' => 'required',
		]);

        $arr = array('msg' => 'خطا!', 'status' => false);
        
        if($validator->passes()){ 

            $id = auth()->user()->id;
            $comment = Comment::updateOrCreate(
            ['id' => $request->value_id],
            ['comment' => $request->comment,'user_id' => $id]
        );
       
        $comment->products()->sync($request->input('product_id'));
        $product = $comment->products->first();
        $user = User::find($id);
        $arr = array('msg' => 'باموفقیت انجام شد!', 'status' => true);

        return response(["comment"=>$comment,"product"=>$product,"user"=>$user,"arr"=>$arr]);

        }
        return response(["arr"=>$arr,'errors'=>$validator->errors()->all()]);

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
    public function edit($id)
    {
        // $products = Product::get();
        // $articles = Article::get();
        // return view('admin.comment.edite',compact('comment','products','articles'));


        $where = array('id' => $id);
        $comment  = Comment::where($where)->first();
        $pro = $comment->products->first()->id;
        if($pro){
            $select = ['id'=>$pro,'state'=>true];
        }
        else{
            $select = ['id'=>'no','state'=>false];
        }
        return response()->json(['comment'=>$comment,'select'=>$select]);
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
        // $this->validate(request(),[
        //     'comment' => 'required',
        //     // 'product_id' => 'required',
        //     // 'article_id' => 'required',
          
        // ]);
       
        // $comment->products()->sync($request->input('commentable_id'));

      
        // $data = $request->all();    
        // $comment->update($data);

        // session()->flash('msg','تغییرات  کامنت انجام شد');
        // return redirect(route('comment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // $comment->delete();
        // session()->flash('msg','  کامنت موردنظر حذف شد');
        // return redirect()->back();

        session()->flash('msg','  کامنت موردنظر حذف شد');
        $comment = Comment::where('id',$id)->delete();
        return response()->json($comment);
    }
}
