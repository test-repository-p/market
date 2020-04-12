<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Category;
use App\Models\Information;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::where('name','like','%home%')->get();
        $banner = Slider::where('name','like','%banner-1%')->get();
        $banner2 = Slider::where('name','like','banner-2')->get();

        $checkouts = Basket::where('user_id',auth()->user()->id)->where('status','0')->get();
        $sum = 0;
        if(count($checkouts)>0)
        {
            foreach($checkouts as $key => $value)
            {
                $cost = $value->price*$value->count;
                $sum += $cost;
            }
        }

        return view('site/basket',compact('slider','banner','banner2','checkouts','sum'));

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
        if($request->ajax())
        {
            $id = $request->input('id');
            $product = Product::find($id);
            if(Basket::where([
                ['user_id','=',auth()->user()->id],
                ['product_id','=',$product->id],
                ['status','=','0']
                ])->get()->count() > 0)               
            {
                if(Basket::where([
                    ['user_id','=',auth()->user()->id],
                    ['product_id','=',$product->id],
                    ['status','=','0']
                    ])->first()->count == $product->count )
                {
                    return response()->json(['count'=>'exceeded']);
                }
                else
                {
                    Basket::where([
                        ['user_id','=',auth()->user()->id],
                        ['product_id','=',$product->id],
                        ['status','=','0']
                        ])->first()->increment('count');
                }
            }
            else
            {
                Basket::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                ]);
            }
            //======number all of product in basket ===========
            $count = count(Basket::where('user_id','=',auth()->user()->id)
            ->where('status','0')->get());
            return response()->json(['basket_create'=>'success','count'=>$count]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(Basket $basket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(Basket $basket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basket $basket)
    {
        $basket->count = $request->input('count');
        $basket->update();
        return response()->json([
            'message' => 'محصول انتخاب شده باموفقیت به روزرسانی شد'
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basket $basket)
    {
      $basket->delete();
      return response()->json([
        'message' => 'محصول انتخاب شده باموفقیت ازسبدخریدحذف شد'
      ]);
    }
}
