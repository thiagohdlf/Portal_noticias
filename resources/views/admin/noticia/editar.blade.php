@extends('layouts.tema')

@section('conteudo')
    <div class="conteiner">
        <h1>Edição de Notícias</h1>
        <div class="col-md-12">
            <form action="{{route('admin.noticia.atualizar', $noticias->id)}}" method="POST">
                @csrf
                @method('put')
                @include('admin.noticia._form')
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
@endsection
