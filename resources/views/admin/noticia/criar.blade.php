@extends('layouts.tema')

@section('conteudo')
    <div class="conteiner">
        <h1>Casdastro de Notícia</h1>
        <div class="col-md-12">
            <form action="{{route('admin.noticia.salvar')}}" method="POST">
                @csrf
                @include('admin.noticia._form')
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
