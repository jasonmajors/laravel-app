@if (count($errors) > 0)
	<div>
		<strong>Uh oh! Something went wrong!</strong>
		<br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>		
	</div>
@endif		