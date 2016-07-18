@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Porta
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Port Form -->
                    <form action="{{ url('newport/'.$port->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
						{{ method_field('PUT') }}

                        <!-- New Port Name -->
                        <div class="form-group">
                            <label for="new-port-name" class="col-sm-3 control-label">Porta</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="first-edit" class="form-control" value="{{  $port->name }}">
                            </div>
                        </div>

                        <!-- Add New Port Button -->
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
