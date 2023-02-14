@extends('layouts.admin')
@section('pageTitle', 'Kategorite e Materialit')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card card-table">
      <div class="card-header">Kategorite e Materialit</div>
      <div class="card-body">
        <table class="table table-striped table-hover table-fw-widget" id="table1">
          <thead>
            <tr>
              <th>Emri</th>
              <th>Llojet</th>
              <th>Sasia</th>
              <th>Pershkrimi</th>
              <th>Veprimet</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr class="odd gradeX">
              <td>{{$category->title}}</td>
              <td>{{$category->materials()->count()}}</td>
              <td>{{$category->materials()->sum('quantity')}}{{$category->unit}}</td>
              <td>{{$category->description}}</td>
              <td>
                  <a href="{{route('material-categories.edit', $category->id)}}" class="btn mr-2 btn-info">Ndryshoje</a>
                <form action="{{route('material-categories.destroy', $category->id)}}" method="POST" class="w-100 d-inline">
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
@endsection
@section('custom_scripts')
<script type="text/javascript">
  $(document).ready(function(){
    //-initialize the javascript
    App.init();
    App.dataTables();
  });
</script>
@endsection
