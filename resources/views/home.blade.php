@extends('layouts.admin')
@section('pageTitle', 'Paneli Kryesor')

@section('content')
<div class="row">
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1"></div>
          <div class="data-info">
            <div class="desc">Gjithsej shitje</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number">{{'0'}}</span>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-4">
      <div class="widget widget-tile">
        <div class="chart sparkline" id="spark2"></div>
        <div class="data-info">
          <div class="desc">Gjithsej Material</div>
          <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number">{{'0'}}</span>
          </div>
        </div>
      </div>
    </div>
    @foreach($categories as $category)
    <div class="col-12 col-lg-6 col-xl-4">
      <div class="widget widget-tile">
        <div class="chart sparkline" id="spark3"></div>
        <div class="data-info">
          <div class="desc">Gjithsej {{$category->title}}</div>
          <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number">{{'0'}}</span>
          </div>
        </div>
      </div>
    </div>
    @endforeach
@endsection
@section('custom_scripts')
<script type="text/javascript">
  $(document).ready(function(){
  	//-initialize the javascript
  	App.init();
  	App.dashboard();
  });
</script>
@endsection
