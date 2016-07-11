@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Modelo de Switch
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Switchmodel Form -->
                    <form action="{{ url('switchmodel/'.$switchModel->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
						{{ method_field('PUT') }}

                        <!-- Switchmodel Name -->
                        <div class="form-group">
                            <label for="switchmodel-name" class="col-sm-3 control-label">Modelo</label>

                            <div class="col-sm-6">
									<input type="text" name="name" id="first-edit" class="form-control" value="{{ $switchModel->name }}">
                            </div>
                        </div>

                        <!-- Switchmodel Port -->
                        <div class="form-group">
                            <label for="switchmodel-port" class="col-sm-3 control-label">Porta</label>

                            <div class="col-sm-6">
                                <input type="text" name="port" id="switchmodel-port" class="form-control" value="{{ $port->name }}">
                            </div>
                        </div>

                        <!-- Switchmodel Oid -->
                        <div class="form-group">
                            <label for="switchmodel-oid" class="col-sm-3 control-label">Oid</label>

                            <div class="col-sm-6">
                                <input type="text" name="oid" id="switchmodel-oid" class="form-control" value="{{ $oid->number }}">
                            </div>
                        </div>

                        <!-- Add Submap Button -->
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
