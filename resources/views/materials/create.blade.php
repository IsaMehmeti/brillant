@extends('layouts.admin')
@section('pageTitle', 'Shto Material')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Shto Material</div>
      <div class="card-body">
        <form action="{{route('materials.store')}}" method="POST">
          @csrf
          <div class="form-group pt-2">
            <label for="inputEmail">Emri<span class="text-danger">*</span> </label>
            <input class="form-control" name="title" id="title" type="text" placeholder="Bambus" value="{{ old('title') }}">
          </div>

          <div class="form-group pt-2">
            <label for="inputEmail">Qmimi(per meter)<span class="text-danger">*</span> </label>
            <input class="form-control" name="price_per_cm" id="price_per_cm"type="number" step="0.01" placeholder="6.3eur" value="{{ old('price_per_cm') }}">
          </div>

          <div class="form-group pt-2">
            <label for="sasia">Sasia(ne meter)<span class="text-danger">*</span> </label>
            <input class="form-control" name="quantity" id="quantity" type="number" step="0.01" placeholder="40.5m" value="{{ old('quantity') }}">
          </div>

          <div class="form-group pt-2">
            <label for="inputEmail">Kategoria<span class="text-danger">*</span> </label>
            <div>
                <select class="form-control" name="category_id">
                  <option selected disabled>Zgjedh Kategorine...</option>
                    @foreach($categories as $category)
                      <option value="{{$category->id}} {{$category->id === old('category_id' ? 'selected' : '')}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
         </div>
         <div class="form-group pt-2">
            <label for="description">Pershkrimi </label>
            <textarea class="form-control" name="description" id="description" type="text">{{ old('description') }}</textarea>
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
