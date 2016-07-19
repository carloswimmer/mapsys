@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Oid
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Submap Form -->
                    <form action="{{ url('newoid/'.$oid->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
						{{ method_field('PUT') }}

                        <!-- Submap Name -->
                        <div class="form-group">
                            <label for="new-oid-name" class="col-sm-3 control-label">Submapa</label>

                            <div class="col-sm-6">
                                <input type="text" name="number" id="first-edit" class="form-control" value="{{  $oid->number }}">
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
