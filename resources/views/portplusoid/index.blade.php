@extends('layouts.app')

@section('content')
	<!-- Content  -->
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Porta com Oid
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors --> 
                    @include('common.errors')

                    <!-- New Port Plus Oid Form -->
                    <form action="{{ url('portplusoid')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                         <!-- Combining Port -->
                        <div class="form-group">
                            <label for="switchmodel-port" class="col-sm-3 control-label">Porta</label>

                            <div class="col-sm-6">
								<select name="port" id="first" class="form-control">
									<option value="" selected></option>
									@foreach ($ports as $port)
										<option value="{{ $port->id }}">{{ $port->name }}</option>
									@endforeach
								</select>
                            </div>

							<!-- Button NewPort -->
							<div class="col-sm-3">
								<a href="{{ url('newport') }}" class="btn btn-default">
								<i class="fa fa-btn fa-plus"></i>Novo
								</a>
							</div>
                        </div>

                         <!-- Combining Oid -->
                        <div class="form-group">
                            <label for="switchmodel-oid" class="col-sm-3 control-label">Oid</label>

                            <div class="col-sm-6">
								<select name="oid" id="oid" class="form-control">
									<option value="" selected></option>
									@foreach ($oids as $oid)
										<option value="{{ $oid->id }}">{{ $oid->number }}</option>
									@endforeach
								</select>
                            </div>

							<!-- Button NewOid -->
							<div class="col-sm-3">
								<a href="{{ url('newoid') }}" class="btn btn-default">
								<i class="fa fa-btn fa-plus"></i>Novo
								</a>
							</div>
                        </div>

                      <!-- Add Port Plus Oid Button -->
                        <div class="form-group">
                            <div class="col-sm-3 text-right">
                                <a href="{{ url('switchmodel') }}" class="btn btn-default">
									<i class="fa fa-btn fa-arrow-left"></i>Voltar
								</a>
							</div>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-floppy-o"></i>Salvar
                                </button>
							</div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Port Plus Oid -->
            @if (count($portPlusOids) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Portas com Oids
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Porta</th>
                                <th>Oid</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($portPlusOids as $portPlusOid)
		                                <tr>
		                                    <td class="table-text"><div>{{ $portPlusOid->name }}</div></td>
		                                    <td class="table-text"><div>{{ $portPlusOid->number }}</div></td>

		                                    <!-- Port Plus Oid Delete Button -->
		                                    <td class="text-right">
		                                        <form action="{{ url('portplusoid/'.$portPlusOid->id) }}" method="POST">
		                                            {{ csrf_field() }}
													{{ method_field('DELETE') }}
	
		                                            <button type="submit" class="btn btn-danger">
		                                                <i class="fa fa-btn fa-trash"></i>
														Deletar
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
