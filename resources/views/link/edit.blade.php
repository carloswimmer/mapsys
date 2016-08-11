@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Host
                </div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Link Form -->
					<form action="{{ url('link/'.$linkA->id) }}" method="POST" class="form-horizontal">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<!-- Link Host A -->
						<div class="form-group">
							<label for="link-host-a" class="col-sm-3 control-label">Host A</label>

							<div class="col-sm-6">
								<select name="hostA" id="first" class="form-control">
									<option value="{{ $linkA->host->id }}" selected>{{ $linkA->host->name }}</option>
									@foreach ($hosts as $host)
										<option value="{{ $host->id }}">{{ $host->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<!-- Link Port A -->
						<div class="form-group">
							<label for="link-port-a" class="col-sm-3 control-label">Porta A</label>

							<div class="col-sm-6">
								<select name="portPlusOidA" id="link-port-a" class="form-control">
									<option value="{{ $linkA->portPlusOid->id }}" selected>{{ $linkA->portPlusOid->port->name }}</option>
								</select>
							</div>
						</div>

						<!-- Link Host B -->
						<div class="form-group">
							<label for="link-host-b" class="col-sm-3 control-label">Host B</label>

							<div class="col-sm-6">
								<select name="hostB" id="host-port-b" class="form-control">
									<option value="{{ $linkA->linkB->host->id }}" selected>{{ $linkA->linkB->host->name }}</option>
									@foreach ($hosts as $host)
										<option value="{{ $host->id }}">{{ $host->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<!-- Link Port B -->
						<div class="form-group">
							<label for="link-port-b" class="col-sm-3 control-label">Porta B</label>

							<div class="col-sm-6">
								<select name="portPlusOidB" id="link-port-b" class="form-control">
									<option value="{{ $linkA->linkB->portPlusOid->id }}" selected>{{ $linkA->linkB->portPlusOid->port->name }}</option>
								</select>
							</div>
						</div>

						<!-- Add Host Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-floppy-o"></i>Salvar
								</button>
							</div>
						</div>
					</form>
				</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

	<script type="text/javascript" src="{{ URL::asset('js/linkFilterEdit.js') }}"></script>

@endsection
