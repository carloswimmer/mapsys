@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Submapa
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Submap Form -->
                    <form action="{{ url('submap/'.$submap->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
						{{ method_field('PUT') }}

                        <!-- Submap Name -->
                        <div class="form-group">
                            <label for="submap-name" class="col-sm-3 control-label">Submapa</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="submap-name" class="form-control" value="{{  $submap->name }}">
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
