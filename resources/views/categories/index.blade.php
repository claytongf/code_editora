@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Categorias</div>
                    <div class="panel-body table-category">
                        <table class="table table-bordered table-responsive" id="table-categories">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <ul>
                                            <li><a href="{{ route('categories.edit', ['category'=>$category->id]) }}">Editar</a></li>
                                            <li>
                                                <?php $deleteForm = "delete-form-{$loop->index}" ?>
                                                <a href="{{ route('categories.destroy', ['category'=>$category->id]) }}"
                                                onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit();">Excluir</a>
                                                {!! Form::open(['route'=>['categories.destroy', $category->id], 'method' => 'DELETE', 'id'=>$deleteForm, 'style' => 'display:none']) !!}
                                                {!! Form::close() !!}
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-11 col-sm-offset-1">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
