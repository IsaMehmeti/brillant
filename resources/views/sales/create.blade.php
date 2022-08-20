@extends('layouts.admin')
@section('pageTitle', 'Shit Material')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-6">
    <div class="card card-border-color card-border-color-primary">
      <div class="card-header card-header-divider">Shit Material</div>
      <div class="card-body">
        <form action="{{route('sales.store')}}" method="POST">
          @csrf
          <div class="form-group pt-2">
            <label for="inputEmail">Klienti<span class="text-danger">*</span> </label>
            <input class="form-control" name="customer_name" id="title" type="text" placeholder="Emri Mbiemri" value="{{ old('customer_name') }}">
          </div>
         <div class="form-group pt-2">
            <label for="inputEmail">Adresa </label>
            <input class="form-control" name="customer_address" id="title" type="text" value="{{ old('customer_name') }}">
          </div>

            <div class="form-group pt-2">
            <label for="inputEmail">Data e shitjes </label>
            <input class="form-control" name="sale_date" id="title" type="date" value="{{ old('sale_date') }}">
          </div>

             @php $i = 1; @endphp
            @foreach($materials as $material)
          <div class="form-group pt-3 align-center form-inline">
            <label for="product"><h4>{{$i}}. {{$material->title}}  </h4></label>
              <input class="form-control col-md-3 ml-3 quantity" name="quantities[]" id="{{$material->id}}" type="number" step="0.01" min="0" placeholder="0m">
              <h4 class="ml-3 text-muted">Ne stok: <span id="stok{{$material->id}}">{{$material->quantity}}</span>m</h4>
              <input type="hidden" id="actual{{$material->id}}" value="{{$material->quantity}}">
              <a href="{{route('sales.remove', $material->id)}}" class="btn btn-danger ml-3">Fshije</a>

          </div>
                @php $i++; @endphp
            @endforeach
            <div class="form-group pt-3 align-center">
              <a href="{{route('materials.index', $material->id)}}" class="btn btn-success">Shto Material+</a>
            </div>
          <div class="row pt-3">
            <div class="col-sm-12">
                <button class="btn btn-space btn-primary text-uppercase" type="submit">Perfundo</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
@endsection
@section('custom_scripts')
    <script>
        const inputs = document.querySelectorAll('.quantity');
        inputs.forEach(input => {
            input.addEventListener('input', e => {
            let id = e.target.id;
            let actualValue = parseFloat(document.getElementById(`actual${id}`).value);
            let inputValue = parseFloat(e.target.value);
            let stockValueElement = document.getElementById(`stok${id}`);
            if(inputValue <= actualValue){
                if(isNaN(inputValue)){
                    stockValueElement.innerText = actualValue;
                }else{
                    stockValueElement.innerText = actualValue - inputValue;
                }
            }else{
                stockValueElement.innerText = actualValue;
                e.target.value = null;
            }

            });
        })

    </script>
 <script type="text/javascript">
  $(document).ready(function(){
    //-initialize the javascript
    App.init();
    App.formElements();
  });
</script>
@endsection
