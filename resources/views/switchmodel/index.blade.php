@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-0 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Criar Modelo de Switch
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
                                <input type="text" name="name" id="switchmodel-name" class="form-control" value="{{ old('submap') }}">
                            </div>
                        </div>

                         <!-- switchmodel Port -->
                        <div class="form-group">
                            <label for="switchmodel-port" class="col-sm-3 control-label">Porta</label>

                            <div class="col-sm-6">
                                <input type="text" name="port" id="switchmodel-port" class="form-control" value="{{ old('submap') }}">
                            </div>
                        </div>

                         <!-- switchmodel Oid -->
                        <div class="form-group">
                            <label for="switchmodel-oid" class="col-sm-3 control-label">Oid</label>

                            <div class="col-sm-6">
                                <input type="text" name="oid" id="switchmodel-oid" class="form-control" value="{{ old('submap') }}">
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
            @if (count($switchmodels) > 0)
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
                                @foreach ($switchmodels as $switchmodel)
                                    <tr>
                                        <td class="table-text"><div>{{ $switchmodel->name }}</div></td>
                                        <td class="table-text"><div>{{ $switchmodel->port }}</div></td>
                                        <td class="table-text"><div>{{ $switchmodel->oid }}</div></td>

                                        <!-- switchmodel Delete Button -->
                                        <td>
                                            <form action="{{ url('switchmodel/'.$switchmodel->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>
													Deletar
                                                </button>
                                            </form>
                                        </td>

                                         <!-- switchmodel Edit Button -->
                                        <td>
                                            <form action="{{ url('switchmodel/'.$switchmodel->id.'/edit') }}" method="GET">

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
