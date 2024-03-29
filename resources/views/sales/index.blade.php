@extends('layouts.admin')
@section('pageTitle', 'Shitjet')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card card-table">
      <div class="card-header">Shitjet</div>
      <div class="card-body">
        <table class="table table-striped table-hover table-fw-widget" id="table1">
          <thead>
            <tr>
              <th>ID</th>
              <th>Klienti</th>
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
              <td>{{$sale->sale_date}}</td>
              <td>
              <form action="{{route('sales.return', $sale->id)}}" method="POST" class="w-100 d-inline">
               @if($sale->materials()->count() > 0)
                      <div class="col-sm-12">
                          <select class="multiple-checkboxes{{$sale->id}}" multiple="multiple" name="material_ids[]">
                            @foreach($sale->materials as $material)
                              <option value="{{$material->id}}"> {{$material->quantity}}{{$material->unit}} {{$material->material_title}} {{$material->material_category}} - {{$material->amount}}eur</option>
                            @endforeach
                          </select>
                      </div>
                @else
                @endif
                  </td>
              <td>
                  @csrf
                  @method('POST')
                <button type="submit" class="btn mr-2 btn-secondary btn-rounded {{$sale->materials()->count() === 0 ? 'd-none' : ''}}">Rikthe <i class="icon mdi mdi-refresh"></i></button>
                </form>
                  <a target="_blank" href="{{route('sales.invoice', $sale->id)}}" class="btn mr-2 btn-success">Printoje <i class="icon mdi mdi-print"></i></a>
                <form action="{{route('sales.destroy', $sale->id)}}" method="POST" class="w-100 d-inline">
                  @csrf
                  @method('Delete')
                <button type="submit" class="btn mr-2 btn-danger">Fshije <i class="icon mdi mdi-delete"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
@endsection
@section('custom_scripts')
<script type="text/javascript">
  $(document).ready(function(){
    //-initialize the javascript
    App.init();
    App.dataTables();
    @foreach ($sales as $sale)
        $('.multiple-checkboxes{{$sale->id}}').multiselect({
            includeSelectAllOption: true,
            nonSelectedText: 'Materialet e Shitura'
        });
    @endforeach

  });
</script>
@endsection
