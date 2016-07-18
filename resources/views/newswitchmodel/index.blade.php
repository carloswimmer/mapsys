@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Criar Modelo de Switch
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors --> 
                    @include('common.errors')

                    <!-- New SwitchModel Form -->
                    <form action="{{ url('newswitchmodel')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- SwitchModel Name -->
                        <div class="form-group">
                            <label for="switch-model-name" class="col-sm-3 control-label">Modelo</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="first" class="form-control">
                            </div>
                        </div>

                        <!-- Add SwitchModel Button -->
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

            <!-- Current Submap -->
            @if (count($switchModels) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lista de Modelos de Switch
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Modelo</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($switchModels as $switchModel)
                                    <tr>
                                        <td class="table-text"><div>{{ $switchModel->name }}</div></td>

                                        <!-- SwitchModel Delete Button -->
                                        <td>
                                            <form action="{{ url('newswitchmodel/'.$switchModel->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>
													Deletar
                                                </button>
                                            </form>
                                        </td>

                                         <!-- NewSwitchModel Edit Button -->
                                        <td>
                                            <form action="{{ url('newswitchmodel/'.$switchModel->id.'/edit') }}" method="GET">

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
