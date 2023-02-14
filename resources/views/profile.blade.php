@extends('layouts.admin')
@section('pageTitle', 'Profili')

@section('content')
<div class="user-profile">
  <div class="row">

    <div class="col-lg-12">
      <div class="card card-border-color card-border-color-primary">
        <div class="card-header card-header-divider">Profili</div>
        <div class="user-display d-flex justify-content-center mt-5 pt-5 mb-2">
        {{-- <div class="user-display-bg"><img src="/img/user-profile-display.png" alt="Profile Background"></div> --}}
        <div class="user-display-bottom mt-5 ">
          <div class="user-display-avatar"><img src="{{asset('/img/avatar-150.png')}}" alt="Avatar"></div>
          <div class="user-display-info">
            <div class="name">{{Auth::user()->name}}</div>
            <div class="nick"><span class="mdi mdi-email"></span> {{Auth::user()->email}}</div>
          </div>
        </div>
      </div>
        <div class="card-body">

          <form action="{{route('user.update')}}" method="POST">
            @csrf
            <div class="row">
              <div class="form-group pt-2 col-md-6">
                <label for="emri">Emri i plote</label>
                <input class="form-control" name="name" id="emri" type="text" value="{{ $user['name'] }}" placeholder="">
              </div>

              <div class="form-group pt-2 col-md-6">
                <label for="email">Email</label>
                <input class="form-control" name="email" id="email" value="{{ $user['email'] }}"  type="email" placeholder="">
              </div>

               <div class="form-group pt-2 col-md-6">
                <label for="Password">Passwordi aktual</label>
                <input class="form-control" name="old_password" id="Password" type="password" placeholder="">
              </div>

              <div class="form-group pt-2 col-md-6">
                <label for="same_password">Passwordi i ri</label>
                <input class="form-control" name="password" id="same_password" type="password" placeholder="">
              </div>

                <div class="col-md-12">
                    <button class="btn btn-space btn-primary text-uppercase" type="submit">Edito</button>
                    <a href="{{ url('/')}}" class="btn btn-space btn-secondary text-uppercase">Anulo</a>
                </div>

            </div>
            @csrf
          </form>



        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom_footer')
  <script src="/js/app-page-profile.js" type="text/javascript"></script>
@endsection

@section('custom_scripts')
<script type="text/javascript">
    $(document).ready(function(){
      //-initialize the javascript
      App.init();
      App.pageProfile();
    });
  </script>
@endsection
