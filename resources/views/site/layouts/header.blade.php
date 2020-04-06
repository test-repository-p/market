<div id="header">
    <!-- Top Bar Start-->
    <nav id="top" class="htop">
        <div class="container">
            <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
                <div class="pull-left flip left-top">
                    <div class="links">
                        <ul>
                            <li class="mobile"><i class="fa fa-phone"></i>{{ $info->telephone }}</li>
                            <li class="email"><a href="mailto:info@happymarket.com"><i class="fa fa-envelope"></i>{{ $info->email }}</a></li>
                        </ul>
                    </div>
                </div>
                <div id="top-links" class="nav pull-right flip">
                    <ul>
                         @guest
                        <li >
                            <a class="nav-link" href="{{ route('login') }}">{{ __('ورود') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a class="nav-link" href="{{ route('register') }}">{{ __('ثبت نام') }}</a>
                        </li>
                        @endif
                        @else
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"> {{ Auth::user()->name }}
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                              <li role="presentation">
                                  <a role="menuitem" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">{{ __('خروج') }}</a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                  @csrf
                              </form>
                                </li>
                              <li role="presentation">
                                  <a role="menuitem" tabindex="-1" href="{{ url('/home') }}">خانه</a>
                                </li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">پروفایل</a></li>
                              <li role="presentation" class="divider"></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> سبدخرید </a></li>
                            </ul>
                          </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Top Bar End-->
    <!-- Header Start-->
    <header class="header-row">
        <div class="container">
            <div class="table-container">
                <!-- Logo Start -->
                <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                    <div id="logo">
                        <a href="{{ route('index') }}"><img class="img-responsive" src="/{{ $logo->photos()->first()->path }}" title="{{ $logo->title }}" alt="{{ $logo->title }}" /></a>
                    </div>
                </div>
                <!-- Logo End -->
                
                <!-- Mini Cart Start-->
                @auth
                <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div id="cart">
                        <a href="/basket" id="shop-cart" type="button" data-toggle="dropdown" data-loading-text="Loading..." class="heading dropdown-toggle">
                        <span class="cart-icon pull-left flip"></span>
                        <span id="cart-total">
                            @if($baskets!=null && count($baskets)>0)
                                {{ count($baskets) }}
                            @endif
                             آیتم - {{ number_format($sum) }} تومان
                        </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <table class="table">
                                    <tbody>

                                        @foreach ($baskets as $item)
                                        <tr>
                                            <td class="text-center">
                                                <a href="product.html"><img class="img-thumbnail" width="50px" height="30px" title="{{ $item->product->name }}" alt="{{ $item->product->name }}" src="/{{ $item->product->photos()->first()->path }}"></a>
                                            </td>
                                            <td class="text-left"><a href="product.html">{{ $item->product->name }}</a></td>
                                            <td class="text-right"> {{ $item->count }}</td>
                                            <td class="text-right">{{ number_format($item->price) }} تومان</td>
                                            <td class="text-center">
                                                <a href="{{ route('basket.destroy',['basket'=>$item->id]) }}"  class="btn btn-danger btn-xs py-0 remove" title="حذف" style="font-size: 0.8em;" id="deleteCompany" data-id="{{ $item->id }}">
                                                    <i class="fa fa-times"></i>
                                                 </a>
                                                {{-- <button class="btn btn-danger btn-xs remove" title="حذف" onClick="" type="button"><i class="fa fa-times"></i></button>class="btn btn-sm btn-outline-danger py-0" --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                        
                                    </tbody>
                                    <script>

                                            $(document).ready(function () {

                                            $("#deleteCompany").click(function(e){

                                            if(!confirm("آیابرای حذف محصول ازسبدخریداطمینان دارید?")) {
                                            return false;
                                            }

                                            e.preventDefault();
                                            var id = $(this).data("id");
                                            // var id = $(this).attr('data-id');
                                            var token = $("meta[name='csrf-token']").attr("content");
                                            var url = e.target;

                                            $.ajax(
                                                {
                                                url: url.href, //or you can use url: "company/"+id,
                                                type: 'DELETE',
                                                data: {
                                                    _token: token,
                                                        id: id
                                                },
                                                success: function (response){

                                                    $("#success").html(response.message)

                                                    Swal.fire(
                                                    'پیام موفقیت',
                                                    'محصول انتخاب شده باموفقیت ازسبدخریدحذف شد!',
                                                    'success'
                                                    )
                                                }
                                            });
                                            return false;
                                            });


                                            });

                                    </script>
                                </table>
                            </li>
                            <li>
                                <div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="text-right"><strong>جمع کل</strong></td>
                                                <td class="text-right">{{ number_format($sum )}} تومان</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="checkout">
                                        <a href="{{ route('basket.index') }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> مشاهده سبد</a>&nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('checkout.index') }}" class="btn btn-primary"><i class="fa fa-share"></i> تسویه حساب</a>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endauth
                <!-- Mini Cart End-->

                <!-- جستجو Start-->
                <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                    <div id="search" class="input-group">
                        <input id="filter_name" type="text" name="search" value="" placeholder="جستجو" class="form-control input-lg" />
                        <button type="button" class="button-search"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <!-- جستجو End-->
            </div>
        </div>
    </header>
    <!-- Header End-->
    <!-- Main آقایانu Start-->
    <div class="container">
        <nav id="menu" class="navbar">
            <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a class="home_link" title="خانه" href="{{ route('index') }}"><span>خانه</span></a></li>


                    <li class="mega-menu dropdown"><a>دسته ها</a>
                        <div class="dropdown-menu">
                        @foreach ($categorys as $category)
                        <div class="column col-lg-2 col-md-3"><a href="{{ url('site/cat/'.$category->id) }}">{{ $category->title }}</a>
                                <div>
                                    <ul>
                                        @foreach ($category->subcategory as $item)
                                        @if($item->parent_id == 0)
                                        <li>
                                            <a href="{{ url('site/subcat/'.$item->id) }}">{{ $item->title }} <span>&rsaquo;</span></a>
                                            <div class="dropdown-menu">
                                                <ul>
                                                    <?php 
                                                    $subs = App\Models\Subcategory::where('parent_id',$item->id)->get();
                                                ?>
                                                @foreach ($subs as $sub)
                                                    <li><a href="{{ route('subcategory.show',['subcategory'=>$sub->id]) }}"> {{ $sub->title}}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </li> 
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </li>


                    <li class="contact-link"><a href="contact-us.html">زیرقیمت بازار </a></li>
                    <li class="contact-link"><a href="{{ route('about.index') }}"> درباره ما </a></li>
                    <li class="contact-link"><a href="{{ route('contact.index') }}">تماس با ما</a></li>
                    <li class="contact-link"><a href="{{ route('weblog.index') }}">وبلاگ </a></li>
                    <li class="custom-link-right"><a href="#" target="_blank"> همین حالا بخرید!</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Main آقایانu End-->
</div>