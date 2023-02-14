@extends('layouts.admin')
@section('pageTitle', 'Nrysho firmen')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Ndrysho firmen</div>
      <div class="card-body">
        <form action="{{route('firms.update', $firm->id)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-group pt-2">
            <label for="emri">Emri<span class="text-danger">*</span></label>
            <input class="form-control" name="title" id="name" type="text" placeholder="" value="{{$firm->title}}">
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button class="btn btn-space btn-primary text-uppercase" type="submit">Ndrysho</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom_footer')
    <script src="/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script src="/js/app-form-elements.js" type="text/javascript"></script>
@endsection
@section('custom_scripts')
 <script type="text/javascript">
  $(document).ready(function(){
    //-initialize the javascript
    App.init();
    App.formElements();
  });
</script>
@endsection
