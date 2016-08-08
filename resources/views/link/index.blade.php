@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-0 col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Criar Link
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Link Form -->
					<form action="{{ url('link') }}" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Link Host A -->
						<div class="form-group">
							<label for="link-host-a" class="col-sm-3 control-label">Host A</label>

							<div class="col-sm-6">
								<select name="hostA" id="first" class="form-control">
									<option value="" selected></option>
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
									<option value="" selected></option>
											@foreach ($portPlusOids as $portPlusOid)
												<option value="{{ $portPlusOid->id }}">{{ $portPlusOid->port->name }}</option>
											@endforeach
								</select>
							</div>
						</div>

						<!-- Link Host B -->
						<div class="form-group">
							<label for="link-host-b" class="col-sm-3 control-label">Host B</label>

							<div class="col-sm-6">
								<select name="hostB" id="host-port-b" class="form-control">
									<option value="" selected></option>
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
									<option value="" selected></option>
										@foreach ($switchModels as $switchModel)
											@foreach ($portPlusOids as $portPlusOid)
												<option value="{{ $portPlusOid->id }}">{{ $portPlusOid->port->name }}</option>
											@endforeach
										@endforeach
								</select>
							</div>
						</div>

						<!-- Add Host Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Salvar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

            <!-- Current Host -->
            @if (count($linkAs) > 0)
                <div class="panel panel-default"> 
                <!-- <div class="container-fluid"> -->
                    <div class="panel-heading">
                        Lista de Links
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Host A</th>
                                <th>Porta A</th>
								<th>Host B</th>
								<th>Porta B</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($hosts as $host)
                                        <td class="table-text"><div>{{ $host->elementid }}</div></td>
                                        <td class="table-text"><div>{{ $host->name }}</div></td>
                                        <td class="table-text"><div>{{ $host->switchmodel->name }}</div></td>
                                        <td class="table-text"><div>{{ $host->submap->name }}</div></td>
	

										<!-- Host Delete Button -->
										<td>
                                            <form action="{{ url('host/'.$host->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>
                                                                                                        Deletar
                                                </button>
                                            </form>
                                        </td>

                                        <!-- Host Edit Button -->
                                        <td>
                                            <form action="{{ url('host/'.$host->id.'/edit') }}" method="GET">

                                                <button type="submit" class="btn btn-default">
                                                    <i class="fa fa-btn fa-pencil"></i>
                                                                                                        Editar
                                                </button>
                                            </form>
                                        </td> 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

		</div>
	</div>
@endsection

@section('scripts')
	
	<script type="text/javascript" src="{{ URL::asset('js/linkFilter.js') }}"></script>

@endsection
