@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
					Bem vindo, escolha um submapa para ser gerado
				</div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
					@include('common.errors')

					<!-- Generator Form -->
					<form action="{{ url('generator') }}" method="GET" class="form-horizontal">

						<!-- Submap Picker -->
						<div class="form-group">
							<label for="submap-picker" class="col-sm-3 control-label">Submapa</label>

							<div class="col-sm-6">
								<select name="submap" id="first" class="form-control" >
									<option value="" selected></option>
									@foreach ($submaps as $submap)
										<option value="{{ $submap->id }}">{{ $submap->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<!-- Add Host Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-download"></i>Download
								</button>
							</div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
