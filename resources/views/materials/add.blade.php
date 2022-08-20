@extends('layouts.admin')
@section('pageTitle', "Shto $material->title")

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Shto {{$material->title}}</div>
      <div class="card-body">
        <form action="{{route('materials.attach', $material)}}" method="POST">
          @csrf
            @method('PATCH')

          <div class="form-group pt-2 flex">
            <h4>Sasia Aktuale: <span id="actual">{{$material->quantity}}</span>m</h4>
            <h4>Sasia pas shtimit: <span id="after">{{$material->quantity}}</span>m</h4>
          </div>
            <div class="form-group pt-2">
            <label for="inputEmail">Sasia<span class="text-danger">*</span> </label>
            <input class="form-control" name="quantity" id="quantity" type="number" step="0.01" placeholder="1.5m" value="{{ old('quantity') }}">
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
    <script>
        const after = document.getElementById('after');
        const actual = document.getElementById('actual');
        const quantity = document.getElementById('quantity');
        quantity.addEventListener('input', e => {
            let inputValue = parseFloat(e.target.value);

            if(isNaN(inputValue)){
                after.innerText = actual.innerText
            }else{
                after.innerText = parseFloat(actual.innerText) + inputValue;
            }

        });

    </script>
 <script type="text/javascript">
  $(document).ready(function(){
    //-initialize the javascript
    App.init();
    App.formElements();
  });
</script>
@endsection
