<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Attribute_Subcategory;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::search($request->all());
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::get();
        $subcategorys = Subcategory::get();
        $attributes = Attribute::get();

        $tags = Tag::get();
        return view('admin.product.create',compact('categorys','tags','attributes','subcategorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['status'] == "on"){
            $request['status'] = 1;
        }
        elseif($request['status'] == null){
            $request['status'] = '0';
        }
        if($request['special'] == "on"){
            $request['special'] = 1;
        }
        elseif($request['special'] == null){
            $request['special'] = '0';
        }
        $this->validate(request(),[
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'image' => 'required',
            'count' => 'required',
            'category_id' => 'required',
            'id.*' => 'required',
            'rate'=>'required',
        ]);

        $user_id = auth()->user()->id;
        $product = Product::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'status' => $request['status'],
            'discount' => $request['discount'],
            'special' => $request['special'],
            'countsale' => '0',
            'category_id' => $request['category_id'],
            'count' => $request['count'],
            'user_id' => $user_id,
        ]);
        
        $ides = $request->get('id');
        
        if(is_array($ides))
        {
            foreach($ides as $key => $value){
                $att_sub = Attribute_Subcategory::find($value);
                $att_sub->product_id = $product->id;
                $att_sub->save();
            }
        }
        // rating=====================
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $product->ratings()->save($rating);

        

        // $tag = Tag::find($request->input('tag_id'));
        $product->tags()->sync($request->input('tag_id'));
            
        $file = $request['image'];
        $path = 'products/';
        $image = $this->ImageUploader($file,$path);
        $photo = new Photo;
        $photo->path = $image;
        $product->photos()->save($photo);

       
        session()->flash('msg','ذخیره محصول جدیدانجام شد');
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categorys = Category::get();
        $attributes = Attribute::get();
        $subcategorys = Subcategory::get();
        $tags = Tag::get();
        return view('admin.product.show',compact('product','categorys','tags','attributes','subcategorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(Gate::allows('view',$product))
        {
            $attributes = Attribute::get();
            $categorys = Category::get();
            $tags = Tag::get();
            return view('admin.product.edite',compact('product','categorys','tags','attributes'));
        }
        else{
            session()->flash('msg',"شمااجازه دسترسی به این بخش راندارید");
            return view('errors.101');
            
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate(request(),[
            'name' => 'required',
            'price' => 'required',
            'discount' => 'required',
            // 'image' => 'required|image',
            'count' => 'required',
            'category_id' => 'required',
            // 'id' =>'required'
        ]);

        if($request['image'])
        {
            unlink($product->photos()->first()->path) or die('Delete Error');
            $file = $request['image'];
            $path = 'products/';
            $image = $this->ImageUploader($file,$path);
        }
        else
        {
            $image = $product->photos()->first()->path;
        }

        $photo = $product->photos()->first();
        $photo->path = $image;
        $photo->save();
       
        $ides = $request->get('id');
        
        if(is_array($ides))
        {
            foreach($ides as $key => $value){
                $att_sub = Attribute_Subcategory::find($value);
                $att_sub->product_id = $product->id;
                $att_sub->save();
            }
        }

        //=====rating====================================
        // $product->ratingPercent($request['rating']);
         // rating=====================
         $rating = new \willvincent\Rateable\Rating;
         $rating->rating = $request->rate;
         $rating->user_id = auth()->user()->id;
         $product->ratings()->save($rating);
        

        // $tag = Tag::find($request->input('tag_id'));
        $product->tags()->sync($request->input('tag_id'));

        $data = $request->all();    
        $product->update($data);

        session()->flash('msg','تغییرات محصول انجام شد');
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $id = $product->id;
        $att_subs = Attribute_Subcategory::where('product_id',$id)->get();
        foreach($att_subs as $key => $value){
            $value->product_id = null;
            $value->save();
        }

        if($product->photos()->first())
        {
            $photo = $product->photos()->first();
            unlink($product->photos()->first()->path) or die('Delete Error');
            $photo->delete();
        }
       
        if($product->tags()->first())
        {
            $tag = $product->tags()->first();
            $tag->delete();
        }
        
        $product->delete();
        session()->flash('msg',' محصول حذف شد');
        return redirect()->back();
    }

    //==============gallery function ===================
    public function viewgallery($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.viewgallery',compact('product'));
    }
    public function gallery($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.gallery',compact('product'));
    }

    public function upload(Request $request)
    {
        $id = $request->get('id');
        $product = Product::findOrFail($id);

        $files = $request->file('file');
        $name = rand()."-".$id.'.'.$files->getClientOriginalExtension();
        if($files->move('uploads/gallery',$name))
        {
                $photo = new Photo;
                $photo->path = 'uploads/gallery/'.$name;
                $product->photos()->save($photo);

            }
            session()->flash('msg','  گالری محصول افزوده  شد'); 
        }
        public function delete_gallery($id)
        {
            $product = Product::findOrFail($id);
            $photo = $product->photos;

            foreach($photo as $val){
                if(strpos($val->path,"-$product->id")){
                    unlink($val->path) or die('Delete Error');
                    $val->delete();
                }
            }
            session()->flash('msg',' گالری حذف شد');
            return redirect()->back();
        }

        
    
}
