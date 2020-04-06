@extends('site.layouts.app')

@section('title')
<title> تماس باما </title>
@endsection

@section('script') 
@endsection

@section('title-content')   
<ul class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li><a href="contact-us.html">تماس با ما</a></li>
  </ul> 
@endsection

@section('content')
<div id="content" class="col-sm-9">
    <h1 class="title">تماس با ما</h1>
    <h3 class="subtitle">محل ما</h3>
    <div class="row">
      <div class="col-sm-3"><img src="image/product/store_location-275x180.jpg" alt="قالب مارکت شاپ" title="قالب مارکت شاپ" class="img-thumbnail" /></div>
      <div class="col-sm-3"><strong>قالب مارکت شاپ</strong><br />
        <address>
        میدان مرکزی،<br />
        خیابان وینگ شماره 22،<br />
        نیویورک،<br />
        ایالات متحده </address>
      </div>
      <div class="col-sm-3"><strong>شماره تلفن</strong><br>
        +91 9898989898<br />
        <br />
        <strong>فکس</strong><br>
        +91 9898989898 </div>
      <div class="col-sm-3"> <strong>ساعات کار</strong><br />
        خدمات مشتریان 24x7<br />
        <br />
        <strong>دیدگاه ها</strong><br />
        در اینجا توضیحات دلخواه خود را قرار دهید. فروشگاه چک قبول نمیکند! </div>
    </div>
    <form class="form-horizontal">
      <fieldset>
        <h3 class="subtitle">با ما ارتباط برقرار کنید</h3>
        <div class="form-group required">
          <label class="col-md-2 col-sm-3 control-label" for="input-name">نام شما</label>
          <div class="col-md-10 col-sm-9">
            <input type="text" name="name" value="" id="input-name" class="form-control" />
          </div>
        </div>
        <div class="form-group required">
          <label class="col-md-2 col-sm-3 control-label" for="input-email">آدرس ایمیل</label>
          <div class="col-md-10 col-sm-9">
            <input type="text" name="email" value="" id="input-email" class="form-control" />
          </div>
        </div>
        <div class="form-group required">
          <label class="col-md-2 col-sm-3 control-label" for="input-enquiry">پرسش</label>
          <div class="col-md-10 col-sm-9">
            <textarea name="enquiry" rows="10" id="input-enquiry" class="form-control"></textarea>
          </div>
        </div>
      </fieldset>
      <div class="buttons">
        <div class="pull-right">
          <input class="btn btn-primary" type="submit" value="ارسال" />
        </div>
      </div>
    </form>
  </div>
@endsection

@section('sidebar')
@include('site.layouts.aside')
@endsection



