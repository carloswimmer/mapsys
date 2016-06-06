@if (count($errors) > 0)
	<!-- Form error list -->
	<div class="alert alert-danger">
		<strong>Alguma coisa deu errado!</strong>

		<br><br>

		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
