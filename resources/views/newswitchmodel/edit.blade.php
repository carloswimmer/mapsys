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

                    <!-- NewSwitchModel Form -->
                    <form action="{{ url('newswitchmodel/'.$switchModel->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
						{{ method_field('PUT') }}

                        <!-- NewSwitchModel Name -->
                        <div class="form-group">
                            <label for="switch-model-name" class="col-sm-3 control-label">Modelo</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="first-edit" class="form-control" value="{{  $switchModel->name }}">
                            </div>
                        </div>

                        <!-- Add NewSwitchModel Button -->
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
