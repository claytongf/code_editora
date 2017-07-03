@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Categoria</div>

                    <div class="panel-body">
                        {!! Form::model($category, ['route'=>['categories.update', 'category'=> $category->id], 'class' => 'form', 'method'=>'PUT']) !!}
                        @include('categories._form')
                        {!! Html::openFormGroup() !!}
                            {!! Button::primary('Salvar Categoria')->submit() !!}
                        {!! Html::closeFormGroup() !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection