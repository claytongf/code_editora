@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Lixeira de Livros</h3>
        </div>
        <div class="row">
            {!! Form::model(compact('search'), ['class' => 'form-inline', 'method'=>'GET']) !!}
                {!!Form::label('search', 'Pesquisar por título:', ['class'=>'control-label'])!!}
                {!!Form::text('search', null, ['class' => 'form-control'])!!}
                {!! Button::primary("Buscar")->submit() !!}
            {!! Form::close() !!}
        </div>
        <div class="row">
            @if($books->count() > 0)
            {!!
                Table::withContents($books->items())->striped()
                 ->callback('Ações', function($field, $book){
                    $linkEdit = route('trashed.books.show', ['book'=>$book->id]);
                    $linkRestore = route('trashed.books.update', ['book'=>$book->id]);
                    $restoreForm = "restore-form-{$book->id}";
                    $form = Form::open(['route'=>['trashed.books.update', 'book'=> $book->id], 'method' => 'PUT', 'id'=>$restoreForm, 'style' => 'display:none']).
                    Form::hidden('redirect_to', URL::previous()).
                    Form::close();
                    $anchorRestore = Button::link('Restaurar')->asLinkTo($linkRestore)->addAttributes([
                        'onclick' => "event.preventDefault();document.getElementById(\"{$restoreForm}\").submit();"
                    ]);
                    return "<ul class=\"list-inline\">".
                            "<li>".Button::link('Ver')->asLinkTo($linkEdit)."</li>".
                            "<li>|</li>".
                            "<li>".$anchorRestore."</li>".
                            "</ul>".
                            $form;
                 })
            !!}
            <div class="col-sm-11 col-sm-offset-1">
                {{ $books->links() }}
            </div>
            @else
                <br/>
                <div class="well well-lg text-center">
                    <strong>Lixeira vazia</strong>
                </div>
            @endif
        </div>
    </div>
@endsection
