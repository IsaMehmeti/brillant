<div class="container">
	<div class="row">
	<div class="col-md-12">
	@if (session('status'))
		    <div class="alert alert-success text-center">
				{{session('status')}}
		    </div>
		@endif
		@if (session('error'))
		    <div class="alert alert-danger text-center">
				{{session('error')}}
		    </div>
		@endif
		@if (session('danger'))
		    <div class="alert alert-danger text-center">
				{{session('danger')}}
		    </div>
		@endif
		@if (session('warning'))
		    <div class="alert alert-warning text-center">
				{{session('warning')}}
		    </div>
		@endif
		<!-- MailChimp -->
		@if (session('status-MailChimp'))
			    <div class="alert alert-success text-center">
					{{session('status')}}
			    </div>
			@endif
			@if (session('error-MailChimp'))
			    <div class="alert alert-danger text-center">
					{{session('error')}}
			    </div>
			@endif
	  @if ($errors->any())
	    <div class="alert alert-danger text-center">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
		@endif
	</div>
</div>
</div>