@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Criar Oid
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors --> 
                    @include('common.errors')

                    <!-- New Oid Form -->
                    <form action="{{ url('newoid')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Oid Number -->
                        <div class="form-group">
                            <label for="new-oid-number" class="col-sm-3 control-label">Oid</label>

                            <div class="col-sm-6">
                                <input type="text" name="number" id="first" class="form-control">
                            </div>
                        </div>

                        <!-- Add Oid Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-3">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Salvar
                                </button>
                            </div>
							<div class="col-sm-3">
                                <a href="{{ url('switchmodel') }}" class="btn btn-default">
                                    <i class="fa fa-btn fa-arrow-left"></i>Voltar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Submap -->
            @if (count($oids) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Oids
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Oid</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($oids as $oid)
                                    <tr>
                                        <td class="table-text"><div>{{ $oid->number }}</div></td>

                                        <!-- Oid Delete Button -->
                                        <td class="text-right">
                                            <form action="{{ url('newoid/'.$oid->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>
													Deletar
                                                </button>
                                            </form>
                                        </td>

                                         <!-- Oid Edit Button -->
                                        <td class="text-right">
                                            <form action="{{ url('newoid/'.$oid->id.'/edit') }}" method="GET">

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
