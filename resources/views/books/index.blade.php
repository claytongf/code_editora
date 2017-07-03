@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <h3>Lista de Livros</h3>

                <a href="{{ route('books.create') }}" class="btn btn-primary">Criar Livro</a>
                <table class="table table-stripped table-responsive" id="table-categories">
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
                                <ul class="list-inline">
                                    <li><a href="{{ route('books.edit', ['category'=>$book->id]) }}">Editar</a></li> | 
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
            <div class="col-sm-11 col-sm-offset-1">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection
