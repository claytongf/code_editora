@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Categorias</div>
                    <div class="panel-body table-category">
                        <a href="{{ route('books.create') }}" class="btn btn-primary">Criar Livro</a>
                        <table class="table table-bordered table-responsive" id="table-categories">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Subtítulo</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->subtitle}}</td>
                                    <td>R$ {{number_format($book->price, 2, ',', '')}}</td>
                                    <td>
                                        <ul>
                                            <li><a href="{{ route('books.edit', ['category'=>$book->id]) }}">Editar</a></li>
                                            <li>
                                                <?php $deleteForm = "delete-form-{$loop->index}" ?>
                                                <a href="{{ route('books.destroy', ['category'=>$book->id]) }}"
                                                onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit();">Excluir</a>
                                                {!! Form::open(['route'=>['books.destroy', $book->id], 'method' => 'DELETE', 'id'=>$deleteForm, 'style' => 'display:none']) !!}
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
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
