 <!-- جستجو Start-->
 <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
    <div id="search" class="input-group">
        <form action="{{ route('search') }}" method="GET">
        <input id="filter_name" type="text" name="query" value="{{ request()->input('query') }}" placeholder="جستجو" class="form-control input-lg" />
        <button type="submit" class="button-search"><i class="fa fa-search"></i></button>
    </form>
    </div>
</div>
<!-- جستجو End-->