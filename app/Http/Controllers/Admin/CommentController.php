<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Product;
use App\User;
use Validator,Redirect,Response;
use Illuminate\Http\Request;

class CommentController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        
        $validator = Validator::make($request->all(), [
			'comment' => 'required|string',
			'status' => 'required',
		]);

        $arr = array('msg' => 'خطا!', 'status' => false);
        
        if($validator->passes()){ 

        $comment = Comment::find($request->value_id);

        $form_data = array(
            'comment'       =>   $request->comment,
            'status'        =>   $request->status,
            'user_id'        =>   $comment->user_id,
        );
        $u = $comment->update($form_data);
        
        if($comment->products->first())
        {
            $val = $comment->products->first()->name;
        }elseif($comment->articles->first())
        {
            $val = $comment->articles->first()->title;

        }
        $item = ['name'=>$val];
       
        $user = $comment->user->first()->name;
         
        $arr = array('msg' => 'باموفقیت انجام شد!', 'status' => true);

        return response(["comment"=>$comment,"item"=>$item,"user"=>$user,"arr"=>$arr]);

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

        $where = array('id' => $id);
        $comment  = Comment::where($where)->first();
        if($comment->products->first()){
            $val = $comment->products->first()->name;
        }elseif($comment->articles->first()){
            $val = $comment->articles->first()->title;

        }
        $item = ['name'=>$val];

        return response()->json(['comment'=>$comment,'item'=>$item]);








        // if($comment->products->first()){
            
        //     $pro = $comment->products->first()->id;
        //     $select = ['id'=>$pro,'status'=>true];
        // }
        // else{
        //     $select = ['status'=>false];
        // }
        // return response()->json(['comment'=>$comment,'select'=>$select]);
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
