@extends('layouts.admin')
@section('pageTitle', 'Raftat')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card card-table">
      <div class="card-header">Raftat</div>
      <div class="card-body">
        <table class="table table-striped table-hover table-fw-widget" id="table1">
          <thead>
            <tr>
              <th>Nr</th>
              <th>Emri</th>
              <th>Pershkrimi</th>
              <th>Materialet</th>
              <th>Veprimet</th>
            </tr>
          </thead>
          <tbody>
            @foreach($shelves as $shelf)
            <tr class="odd gradeX">
              <td>{{$shelf->id}}</td>
              <td>{{$shelf->title}}</td>
              <td>{{$shelf->description}}</td>
                @if($shelf->materials()->count() > 0)
                  <td>
                      <div class="col-sm-5">
                        <select class="form-control">
                            @foreach($shelf->materials as $material)
                              <option>{{$material->title}} - {{$material->pivot->quantity}}m</option>
                            @endforeach
                        </select>
                      </div>
                  </td>
                @else
                    <td>
                       I zbrazet
                    </td>
                @endif
              <td><a href="{{route('shelves.edit', $shelf->id)}}" class="btn mr-2 btn-info">Ndryshoje</a>
                <form action="{{route('shelves.destroy', $shelf->id)}}" method="POST" class="w-100 d-inline">
                  @csrf
                  @method('Delete')
                <button type="submit" class="btn mr-2 btn-danger">Fshije</button>
                </form>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom_footer')
  <script src="/lib/datatables/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/jszip/jszip.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/pdfmake/pdfmake.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/pdfmake/vfs_fonts.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
  <script src="/lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
  <script src="/js/app-tables-datatables.js" type="text/javascript"></script>
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
