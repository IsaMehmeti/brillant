@extends('layouts.admin')
@section('pageTitle', 'Shto Material')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Shto Material</div>
      <div class="card-body">
        <form action="{{route('materials.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group pt-2">
            <label for="input">Kodi<span class="text-danger">*</span> </label>
            <input class="form-control" name="code" id="code" type="text" placeholder="" value="{{ old('code') }}">
          </div>

          <div class="form-group pt-2">
            <label for="inputEmri">Emri</label>
            <input class="form-control" name="title" id="title" type="text" placeholder="" value="{{ old('title') }}">
          </div>

          <div class="form-group pt-2">
            <label for="inputNgjyra">Ngjyra</label>
            <input class="form-control" name="color" id="color" type="text" placeholder="" value="{{ old('color') }}">
          </div>

          <div class="form-group pt-2">
            <label for="inputEmail">Firma<span class="text-danger">*</span> </label>
            <div>
                <select class="form-control" name="firm_id">
                  <option selected disabled>Zgjedh Firmen...</option>
                    @foreach($firms as $firm)
                      <option value="{{$firm->id}}" {{$firm->id == old('firm_id') ? 'selected' : ''}}>{{$firm->title}}</option>
                    @endforeach
                </select>
            </div>
         </div>
        <div class="form-group pt-2">
            <label for="inputEmail">Kategoria<span class="text-danger">*</span> </label>
            <div>
                <select class="form-control" name="category_id">
                  <option selected disabled>Zgjedh Kategorine...</option>
                    @foreach($categories as $category)
                      <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
         </div>

          <div class="form-group pt-2">
            <label for="sasia">Sasia<span class="text-danger">*</span> </label>
            <input class="form-control" name="quantity" id="quantity" type="number" step="0.01" placeholder="0" value="{{ old('quantity') }}">
          </div>

         <div class="form-group pt-2">
            <label for="description">Pershkrimi </label>
            <textarea class="form-control" name="description" id="description" type="text">{{ old('description') }}</textarea>
          </div>

          <div class="form-group pt-2">
            <label for="description">Foto </label>
            <input class="form-control" name="image" id="image" type="file">
          </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button class="btn btn-space btn-primary text-uppercase" type="submit">Shto</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom_footer')
    <script src="{{asset('/lib/bs-custom-file-input/bs-custom-file-input.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/app-form-elements.js')}}" type="text/javascript"></script>
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
