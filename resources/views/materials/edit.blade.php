@extends('layouts.admin')
@section('pageTitle', 'Nrysho Materialin')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Ndrysho Materialin</div>
      <div class="card-body">
        <form action="{{route('materials.update', $material->id)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class="form-group pt-2">
            <label for="emri">Emri</label>
            <input class="form-control" name="title" id="name" type="text" placeholder="" value="{{$material->title}}">
          </div>

          <div class="form-group pt-2">
            <label for="inputEmail">Qmimi(per meter)<span class="text-danger">*</span> </label>
            <input class="form-control" name="price_per_cm" id="price_per_cm"type="number" step="0.01" placeholder="6.3" value="{{ $material->price_per_cm }}">
          </div>

          <div class="form-group pt-2">
            <label for="sasia">Sasia(ne meter)<span class="text-danger">*</span> </label>
            <input class="form-control" name="quantity" id="quantity"type="number" step="0.01" placeholder="40.5m" value="{{ $material->quantity }}">
          </div>

          <div class="form-group pt-2">
            <label for="inputEmail">Kategoria<span class="text-danger">*</span> </label>
            <div>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                      <option value="{{$category->id}}" {{$category->id === $material->category_id ? 'selected' : ''}}> {{$category->title}}</option>
                    @endforeach
                </select>
            </div>
         </div>
          <div class="form-group pt-2">
            <label for="Pershkrimi">Pershkrimi</label>
            <textarea class="form-control" name="description" id="surname" type="text">{{$category->description}}</textarea>
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
