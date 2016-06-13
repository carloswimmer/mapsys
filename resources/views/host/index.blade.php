@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Criar Host
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New Host Form -->
					<form action="{{ url('host') }}" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Host Elementid -->
						<div class="form-group">
							<label for="host-elementid" class="col-sm-3 control-label">Id no Zabbix</label>

							<div class="col-sm-6">
								<input type="text" name="elementid" id="host-elementid" class="form-control" value="{{ old('host') }}">
							</div>
						</div>

						<!-- Host Name -->
						<div class="form-group">
							<label for="host-name" class="col-sm-3 control-label">Host</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="host-name" class="form-control" value="{{ old('host') }}">
							</div>
						</div>

						<!-- Host Submap -->
						<div class="form-group">
							<label for="host-submap" class="col-sm-3 control-label">Submapa</label>

							<div class="col-sm-6">
								<select name="submap_id" id="host-submap_id" class="form-control" value="{{ old('host') }}">
									@foreach ($submaps as $submap)
										<option value={{ $submap->id }}>{{ $submap->name }}</option>
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
            @if (count($hosts) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Hosts
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Elementid</th>
                                <th>Host</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($hosts as $host)
                                    <tr>
                                        <td class="table-text"><div>{{ $host->elementid }}</div></td>
                                        <td class="table-text"><div>{{ $host->name }}</div></td>

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