<!-- right side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image">
          @if(auth()->user()->photos()->first())
              <img src="/{{ auth()->user()->photos()->first()->path }}" class="img-circle" alt="User Image">
              @else
          <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          @endif

        </div>
        <div class="pull-right info">
          <p>{{ auth()->user()->name }}</p>
          <a href="{{ Route('panel.index') }}"><i class="fa fa-circle text-success"></i> آنلاین</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="جستجو">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">منو</li>
     
        <li>
          <a href="{{ Route('panel.index') }}">
            <i class="fa fa-user"></i> <span> پروفایل {{ auth()->user()->roles->first()->title }}</span>
            <span class="pull-left-container">
              <small class="label pull-left bg-green">جدید</small>
            </span>
          </a>
        </li>


      @if(auth()->user()->level=='admin')
      @can('user_manager')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span> مدیریت کاربران</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ Route('user.index') }}"><i class="fa fa-circle-o text-aqua"></i> کاربران</a></li>
            <li><a href="{{ Route('role.index') }}"><i class="fa fa-circle-o text-aqua"></i> سطوح دسترسی</a></li>
            <li><a href="{{ Route('permission.index') }}"><i class="fa fa-circle-o text-aqua"></i> دسترسی ها</a></li>
          </ul>
        </li>
        @endcan
     
        @can('product_manager')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-barcode"></i> <span> مدیریت محصولات</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-aqua"></i>  محصولات
                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ Route('product.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست محصولات</a></li>
                <li><a href="{{ Route('product.create') }}"><i class="fa fa-circle-o text-aqua"></i>   افزودن محصول جدید</a></li>               
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-aqua"></i>  صورت وضعیت محصولات
                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ Route('product.index') }}"><i class="fa fa-circle-o text-aqua"></i> خریداری شده ها</a></li>
                <li><a href="{{ Route('product.index') }}"><i class="fa fa-circle-o text-aqua"></i>  دانلود ها</a></li>               
              </ul>
            </li>
          </ul>
        </li>
        @endcan
        <li class="treeview">
          <a href="#">
            <i class="fa fa-comments"></i> <span> مدیریت  کامنت ها</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('product_comment_manager')
            <li><a href="{{ Route('comment.index') }}"><i class="fa fa-circle-o text-aqua"></i> کامنت های محصولات  </a></li>
            @endcan
            @can('article_comment_manager')           
            <li><a href="{{ Route('comment.index') }}"><i class="fa fa-circle-o text-aqua"></i>  کامنت های مقاله ها </a></li>
            @endcan           
          </ul>
        </li>
        @can('category_manager')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-navicon"></i> <span>مدیریت دسته ها</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ Route('category.index') }}"><i class="fa fa-circle-o text-aqua"></i> دسته بندی اصلی</a></li>

            @can('subcategory_manager')
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-aqua"></i>  زیرگروه ها
                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ Route('subcategory.index') }}"><i class="fa fa-circle-o text-aqua"></i>  لیست زیرگروه ها</a></li>
                <li><a href="{{ Route('subcategory.create') }}"><i class="fa fa-circle-o text-aqua"></i>  افزودن زیرگروه جدید</a></li>
              </ul>
            </li>
            @endcan
            @can('attribute_manager')
            <li><a href="{{ Route('attribute.index') }}"><i class="fa fa-circle-o text-aqua"></i> ویژگی ها</a></li>
            @endcan
            {{-- @can('attributevalue_manager') --}}
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-aqua"></i>   مقادیرویژگی ها
                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ Route('attributevalue.index') }}"><i class="fa fa-circle-o text-aqua"></i>  لیست مقادیر ها</a></li>
                <li><a href="{{ Route('attributevalue.create') }}"><i class="fa fa-circle-o text-aqua"></i>  افزودن مقدار جدید</a></li>
              </ul>
            </li>
            {{-- @endcan --}}
          </ul>
        </li>
        @endcan
        {{-- end category_manager can --}}
        @can('weblog_manager')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-keyboard-o"></i> <span>مدیریت وبلاگ</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            {{-- @can('article_manager') --}}
            <li><a href="{{ Route('article.index') }}"><i class="fa fa-circle-o text-aqua"></i>مقالات</a></li>
            {{-- @endcan --}}
            {{-- @can('post_manager') --}}
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o text-aqua"></i> پست ها
                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ Route('article.index') }}"><i class="fa fa-circle-o  text-aqua"></i> پست های خبری</a></li>
                <li><a href="{{ Route('article.index') }}"><i class="fa fa-circle-o  text-aqua"></i> پست های آموزشی</a></li>
              </ul>
            </li>
            {{-- @endcan --}}
          </ul>
        </li>
        @endcan

        @can('slider_manager')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-image"></i> <span> مدیریت اسلایدشو</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ Route('slider.index') }}"><i class="fa fa-circle-o text-aqua"></i> اسلایدر</a></li>
            <li><a href="{{ Route('logo.index') }}"><i class="fa fa-circle-o text-aqua"></i>لوگو</a></li>
          </ul>
        </li>
        @endcan
        @can('tag_manager')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span> مدیریت  کلمات کلیدی</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ Route('tag.index') }}"><i class="fa fa-circle-o text-aqua"></i>  کلمات کلیدی</a></li>
          </ul>
        </li>
        @endcan
       
        @can('information_manager')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-info"></i> <span> مدیریت اطلاعات تماس</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ Route('information.index') }}"><i class="fa fa-circle-o text-aqua"></i> اطلاعات تماس </a></li>
          </ul>
        </li>
       @endcan
      @can('user_manager')
       <li>
        <a href="#">
          <i class="fa fa-pie-chart"></i> <span> آمار</span>
          <span class="pull-left-container">
            <small class="label pull-left bg-green">جدید</small>
          </span>
        </a>
      </li>
       <li>
        <a href="#">
          <i class="fa fa-calendar"></i> <span>تقویم</span>
          <span class="pull-left-container">
            <small class="label pull-left bg-red">۳</small>
            <small class="label pull-left bg-blue">۱۷</small>
          </span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-envelope"></i> <span>ایمیل ها</span>
          <span class="pull-left-container">
            <small class="label pull-left bg-yellow">۱۲</small>
            <small class="label pull-left bg-green">۱۶</small>
            <small class="label pull-left bg-red">۵</small>
          </span>
        </a>
      </li>
      @endcan
        <li class="header">برچسب ها</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>مهم</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>هشدار</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>اطلاعات</span></a></li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>