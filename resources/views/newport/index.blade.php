@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Criar Porta
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors --> 
                    @include('common.errors')

                    <!-- New Port Form -->
                    <form action="{{ url('newport')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- New Port Name -->
                        <div class="form-group">
                            <label for="port-name" class="col-sm-3 control-label">Porta</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="first" class="form-control">
                            </div>
                        </div>

                        <!-- Add New Port Button -->
                        <div class="form-group">
                            <div class="col-sm-3 text-right">
                                <a href="{{ url('portplusoid') }}" class="btn btn-default">
                                    <i class="fa fa-btn fa-arrow-left"></i>Voltar
                                </a>
                            </div>
							<div class="col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Submap -->
            @if (count($ports) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Portas
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Porta</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($ports as $port)
                                    <tr>
                                        <td class="table-text"><div>{{ $port->name }}</div></td>

                                        <!-- Port Delete Button -->
                                        <td class="text-right">
                                            <form action="{{ url('newport/'.$port->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>
													Deletar
                                                </button>
                                            </form>
                                        </td>

                                         <!-- Port Edit Button -->
                                        <td class="text-right">
                                            <form action="{{ url('newport/'.$port->id.'/edit') }}" method="GET">

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
