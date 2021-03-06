@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Novo Livro</div>


                    <div class="panel-body">
                        {!! Form::open(['route'=>'books.store', 'class' => 'form']) !!}
                        @include('books._form')
                        {!! Html::openFormGroup() !!}
                            {!! Form::submit('Cadastrar Livro', ['class'=>'btn btn-primary']) !!}
                        {!! Html::closeFormGroup() !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection