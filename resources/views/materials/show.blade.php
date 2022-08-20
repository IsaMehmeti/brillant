@extends('layouts.admin')
@section('pageTitle', $category->title)

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card card-table">
      <div class="card-header">{{$category->title}}</div>
      <div class="card-body">
        <table class="table table-striped table-hover table-fw-widget" id="table1">
          <thead>
            <tr>
              <th>Emri</th>
              <th>Sasia</th>
              <th>Qmimi per meter</th>
              <th>Pershkrimi</th>
              <th>Veprimet</th>
            </tr>
          </thead>
          <tbody>
            @foreach($materials as $material)
            <tr class="odd gradeX">
              <td>{{$material->title}}</td>
              <td>{{$material->quantity}}m  <a href="{{route('materials.add', $material->id)}}" class="btn ml-1 btn-secondary btn-rounded">Shto+</a></td>
              <td>{{$material->price_per_cm}}eur</td>
              <td>{{$material->description}}</td>
              <td>
                  <a href="{{route('materials.edit', $material->id)}}" class="btn mr-2 btn-info">Ndryshoje</a>
                <form action="{{route('materials.destroy', $material->id)}}" method="POST" class="w-100 d-inline">
                  @csrf
                  @method('Delete')
                <button type="submit" class="btn mr-2 btn-danger">Fshije</button>
                      @if(cache()->get('data'))
                      @if(!in_array($material->id, json_decode(cache()->get('data'))))
                          <a href="{{route('sales.add', $material->id)}}" class="btn mr-2 btn-success">Shite</a>
                      @endif
                  @else
                    <a href="{{route('sales.add', $material->id)}}" class="btn mr-2 btn-success">Shite</a>
                  @endif
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
