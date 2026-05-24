@if(session()->has('success'))
	<div class="alert alert-success" style="border-radius: 0">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong> <i class="fa fa-check"></i></strong> {{session()->get('success')}}
	</div>
@endif
@if(session()->has('error'))
	<div class="alert alert-danger" style="border-radius: 0">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong> <i class="fa fa-times"></i></strong> {{session()->get('error')}}
	</div>
@endif
@if(session()->has('info'))
	<div class="alert alert-info" style="border-radius: 0">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong> <i class="fa fa-exclamation"></i></strong> {{session()->get('info')}}
	</div>
@endif
@if(session()->has('warning'))
	<div class="alert alert-warning" style="border-radius: 0">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong> <i class="fa fa-alert"></i></strong> {{session()->get('warning')}}
	</div>
@endif
