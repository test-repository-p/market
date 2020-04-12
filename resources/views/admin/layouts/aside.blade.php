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
     
      @if(auth()->user()->level=='admin')
      @can('user_manager')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span> مدیریت کاربران</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ Route('user.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست کاربران</a></li>
            <li><a href="{{ Route('user.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن کاربرجدید </a></li>
            <li><a href="{{ Route('role.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست سطوح دسترسی</a></li>
            <li><a href="{{ Route('role.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن سطح جدید </a></li>
            <li><a href="{{ Route('permission.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست دسترسی ها</a></li>
            <li><a href="{{ Route('permission.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن دسترسی جدید </a></li>
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
            <li><a href="{{ Route('product.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست محصولات</a></li>
            <li><a href="{{ Route('product.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن محصول جدید </a></li>
          </ul>
        </li>
        @endcan
        @can('category_manager')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-navicon"></i> <span> مدیریت دسته بندی ها</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ Route('category.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست دسته بندی ها</a></li>
            <li><a href="{{ Route('category.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن دسته بندی جدید </a></li>
            @can('subcategory_manager')
            <li><a href="{{ Route('subcategory.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست زیرگروه ها</a></li>
            <li><a href="{{ Route('subcategory.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن زیرگروه جدید </a></li>
            @endcan
            @can('attribute_manager')
            <li><a href="{{ Route('attribute.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست ویژگی ها</a></li>
            <li><a href="{{ Route('attribute.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن ویژگی جدید </a></li>
            @endcan
            {{-- @can('attributevalue_manager') --}}
            <li><a href="{{ Route('attributevalue.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست مقادیر ویژگی ها</a></li>
            <li><a href="{{ Route('attributevalue.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن مقدار جدید </a></li>
            {{-- @endcan --}}
            
          </ul>
        </li>
        @endcan
        @can('attribute_manager')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span> مدیریت  کلمات کلیدی</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ Route('tag.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست  کلمات کلیدی</a></li>
            <li><a href="{{ Route('tag.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن کلمه کلیدی جدید </a></li>
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
            <li><a href="{{ Route('slider.index') }}"><i class="fa fa-circle-o text-aqua"></i>لیست اسلایدرها</a></li>
            <li><a href="{{ Route('slider.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن  اسلایدر جدید </a></li>
          </ul>
        </li>
        @endcan
        {{-- @can('information_manager') --}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-info"></i> <span> مدیریت اطلاعات تماس</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ Route('information.index') }}"><i class="fa fa-circle-o text-aqua"></i> اطلاعات تماس </a></li>
        <li><a href="{{ Route('information.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن اطلاعات تماس </a></li>
          </ul>
        </li>
       {{-- @endcan --}}
       {{-- @can('logo_manager') --}}
       <li class="treeview">
        <a href="#">
          <i class="fa fa-image"></i> <span> مدیریت  لوگوسایت</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-right pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ Route('logo.index') }}"><i class="fa fa-circle-o text-aqua"></i>لوگو  </a></li>
      <li><a href="{{ Route('logo.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن  لوگوجدید </a></li>
        </ul>
      </li>
     {{-- @endcan --}}
     {{-- @can('article_manager') --}}
     <li class="treeview">
      <a href="#">
        <i class="fa fa-book"></i> <span> مدیریت  مقالات</span>
        <span class="pull-left-container">
          <i class="fa fa-angle-right pull-left"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ Route('article.index') }}"><i class="fa fa-circle-o text-aqua"></i>مقالات  </a></li>
    <li><a href="{{ Route('article.create') }}"><i class="fa fa-circle-o text-aqua"></i>افزودن  مقاله جدید </a></li>
      </ul>
    </li>
   {{-- @endcan --}}
   {{-- @can('comment_manager') --}}
   <li class="treeview">
    <a href="#">
      <i class="fa fa-envelope"></i> <span> مدیریت  کامنت ها</span>
      <span class="pull-left-container">
        <i class="fa fa-angle-right pull-left"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ Route('comment.index') }}"><i class="fa fa-circle-o text-aqua"></i> کامنت های محصولات  </a></li>
  <li><a href=""><i class="fa fa-circle-o text-aqua"></i>  کامنت های مقاله ها </a></li>
    </ul>
  </li>
 {{-- @endcan --}}
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>