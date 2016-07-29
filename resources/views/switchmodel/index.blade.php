@extends('layouts.app')

@section('content')
	<!-- Content  -->
    <div class="container">
        <div class="col-sm-offset-0 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Modelo de Switch com atributos
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors --> 
                    @include('common.errors')

                    <!-- New switchmodel Form -->
                    <form action="{{ url('switchmodel')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- switchmodel Name -->
                        <div class="form-group">
                            <label for="switchmodel-name" class="col-sm-3 control-label">Modelo</label>

                        	<div class="col-sm-6">
								<select name="switchModel" id="first" class="form-control">
									<option value="" selected></option>
									@foreach ($switchModels as $switchModel)
										<option value="{{ $switchModel->id }}">{{ $switchModel->name }}</option>
									@endforeach
								</select>
                        	</div>

							<!-- Button newSwitchModel -->
							<div class="col-sm-3">
								<a href="{{ url('newswitchmodel') }}" class="btn btn-default">
								<i class="fa fa-btn fa-plus"></i>Novo
								</a>
							</div>
                        </div>

                         <!-- switchmodel Port -->
                        <div class="form-group">
                            <label for="switchmodel-port" class="col-sm-3 control-label">Porta</label>

                            <div class="col-sm-6">
								<select name="port" id="port" class="form-control">
									<option value="" selected></option>
									@foreach ($ports as $port)
										<option value="{{ $port->id }}">{{ $port->name }}</option>
									@endforeach
								</select>
                            </div>

							<!-- Button Port Plus Oid -->
							<div class="col-sm-3">
								<a href="{{ url('portplusoid') }}" class="btn btn-default">
								Porta &nbsp;<i class="fa fa-btn fa-plus"></i>Oid
								</a>
							</div>
                        </div>

                         <!-- switchmodel Oid -->
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

							                        </div>

                      <!-- Add switchmodel Button -->
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

            <!-- Current switchmodel -->
            @if (count($switchModels) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Modelos de Switch
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Modelo</th>
                                <th>Porta</th>
                                <th>Oid</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($switchModels as $switchModel)
                                	@foreach ($switchModel->ports as $port)
		                                <tr>
		                                    <td class="table-text"><div>{{ $switchModel->name }}</div></td>
		                                    <td class="table-text"><div>{{ $port->name }}</div></td>

		                                    <!-- switchmodel Delete Button -->
		                                    <td class="text-right">
		                                        <form action="{{ url('switchmodel/delete') }}" method="POST">
		                                            {{ csrf_field() }}
	
													<input type="hidden" name="switchModel" value="{{ $switchModel->id }}">
													<input type="hidden" name="port" value="{{ $port->id }}">
													<input type="hidden" name="oid" value="{{ $oid->id }}">
		                                            <button type="submit" class="btn btn-danger">
		                                                <i class="fa fa-btn fa-trash"></i>
														Deletar
		                                            </button>
		                                        </form>
		                                    </td>
		                                </tr>
                                	@endforeach
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
	
	<script type="text/javascript" src="{{ URL::asset('js/oidCaller.js') }}"></script>

@endsection
