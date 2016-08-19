@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Criar Submapa
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors --> 
                    @include('common.errors')

                    <!-- New Submap Form -->
                    <form action="{{ url('submap')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Submap Name -->
                        <div class="form-group">
                            <label for="submap-name" class="col-sm-3 control-label">Submapa</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="first" class="form-control" value="{{ old('submap') }}">
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

            <!-- Current Submap -->
            @if (count($submaps) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Submapas
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Submapa</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($submaps as $submap)
                                    <tr>
                                        <td class="table-text"><div>{{ $submap->name }}</div></td>

                                        <!-- Submap Delete Button -->
                                        <td class="text-right">
                                            <form action="{{ url('submap/'.$submap->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>
													Deletar
                                                </button>
                                            </form>
                                        </td>

                                         <!-- Submap Edit Button -->
                                        <td class="text-right">
                                            <form action="{{ url('submap/'.$submap->id.'/edit') }}" method="GET">

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
