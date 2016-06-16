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

                    <!-- New Host Form -->
                    <form action="{{ url('host/'.$host->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <!-- Host Elementid -->
                        <div class="form-group">
                            <label for="host-elementid" class="col-sm-3 control-label">Elementid</label>

                            <div class="col-sm-6">
                                <input type="text" name="elementid" id="host-elementid" class="form-control" value="{{  $host->elementid }}">
                            </div>
                        </div>

 						<!-- Host Name -->
                        <div class="form-group">
                            <label for="host-name" class="col-sm-3 control-label">Host</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="host-name" class="form-control" value="{{  $host->name }}">
                            </div>
                        </div>

                        <!-- Host Submap -->
                        <div class="form-group">
                            <label for="host-submap" class="col-sm-3 control-label">Submapa</label>

                            <div class="col-sm-6">
                                <select name="submap" id="host-submap" class="form-control" value="{{ $host->submap->name }}">
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