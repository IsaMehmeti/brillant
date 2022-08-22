@extends('layouts.admin')
@section('pageTitle', 'Materiali')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card card-table">
      <div class="card-header">Materiali</div>
      <div class="card-body">
        <table class="table table-striped table-hover table-fw-widget" id="table1">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Firma</th>
              <th>Kodi</th>
              <th>Emri</th>
              <th>Ngjyra</th>
              <th>Sasia</th>
              <th>Kategoria</th>
              <th>Pershkrimi</th>
              <th>Veprimet</th>
            </tr>
          </thead>
          <tbody>
            @foreach($materials as $material)
            <tr class="odd gradeX">
              <td>
                  @if($material->getMedia('images')->first())
                      <img src="{{$material->getMedia('images')->first()->original_url}}" alt="No image" width="70">
                  @endif
              </td>
              <td>{{$material->firm->title}}</td>
              <td>{{$material->code}}</td>
              <td>{{$material->title}}</td>
              <td>{{$material->color}}</td>
              <td>{{$material->quantity}}{{$material->category->unit}}  <a href="{{route('materials.add', $material->id)}}" class="btn ml-1 btn-secondary btn-rounded">Shto+</a></td>
              <td>{{$material->category->title}}</td>
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
