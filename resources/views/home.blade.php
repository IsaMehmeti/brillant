@extends('layouts.admin')
@section('pageTitle', 'Paneli Kryesor')

@section('content')
<div class="row">
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="widget widget-tile">
          <div class="chart sparkline" id="spark1"></div>
          <div class="data-info">
            <div class="desc">Gjithsej shitje</div>
            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number">{{$sale}}eur</span>
            </div>
          </div>
        </div>
    </div>
    @php
        $i = 2;
    @endphp
    @foreach($categories as $category)
    <div class="col-12 col-lg-6 col-xl-4">
      <div class="widget widget-tile">
        <div class="chart sparkline" id="spark{{$i}}"></div>
        <div class="data-info">
          <div class="desc">Gjithsej {{$category->title}}</div>
            @php
                $name = $category->title;
            @endphp
          <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number">{{$$name}}{{$category->unit}}</span>
          </div>
        </div>
      </div>
    </div>
        @php $i++; @endphp
    @endforeach
    @if($sales->count())
  <div class="col-sm-12">
    <div class="card card-table">
      <div class="card-header">5 Shitjet e fundit</div>
      <div class="card-body">
        <table class="table table-striped table-hover table-fw-widget" id="table1">
          <thead>
            <tr>
              <th>ID</th>
              <th>Klienti</th>
              <th>Adresa e Klientit</th>
              <th>Data</th>
              <th>Materiali</th>
              <th>Veprimet</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sales as $sale)
            <tr class="odd gradeX">
              <td>{{$sale->id}}</td>
              <td>{{$sale->customer_name}}</td>
              <td>{{$sale->customer_address}}</td>
              <td>{{$sale->sale_date}}</td>
               @if($sale->materials()->count() > 0)
                  <td>
                      <div class="col-sm-12">
                        <select class="form-control">
                            @foreach($sale->materials as $material)
                              <option> {{$material->quantity}}{{$material->unit}} {{$material->material_title}} {{$material->material_category}} - {{$material->amount}}eur</option>
                            @endforeach
                        </select>
                      </div>
                  </td>
                @else
                    <td>
                    </td>
                @endif
              <td>
                  <a target="_blank" href="{{route('sales.invoice', $sale->id)}}" class="btn mr-2 btn-success">Printoje</a>
                <form action="{{route('sales.destroy', $sale->id)}}" method="POST" class="w-100 d-inline">
                  @csrf
                  @method('Delete')
                <button type="submit" class="btn mr-2 btn-danger">Fshije</button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
    @endif

@endsection
@section('custom_footer')
  <script src="{{asset('/lib/datatables/datatables.net/js/jquery.dataTables.js')}}" type="text/javascript"></script>
  <script src="{{asset('/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js')}}" type="text/javascript"></script>
  <script src="{{asset('/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/lib/datatables/jszip/jszip.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/lib/datatables/pdfmake/pdfmake.min.js')}}" type="text/javascript'"></script>
  <script src="{{asset('/lib/datatables/pdfmake/vfs_fonts.js')}}" type="text/javascript'"></script>
  <script src="{{asset('/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/lib/datatables/datatables.net-buttons/js/buttons.print.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/js/app-tables-datatables.js')}}" type="text/javascript"></script>
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
