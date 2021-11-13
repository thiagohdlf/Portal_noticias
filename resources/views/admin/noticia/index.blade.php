@extends('layouts.tema')

@section('conteudo')


    <div class="col-md-4">
      <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        {{auth()->user()->name}}
      </button>
      <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="#">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-info">Sair</button>
                </form>
            </a>
        </li>
      </ul>
    </div>
    <div class="container">
        <form action="{{ route('admin.noticia.pesquisar') }}" method="post">
            @csrf
            <div class="col-md-3">
                <input type="text" name="pesquisa" placeholder="Pesquisar:" class="control-form">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Texto</th>
                    <th>Publicação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($noticias as $n)
                <tr>
                    <td >{{$n->titulo}}</td>
                    <td>{{$n->descricao}}</td>
                    <td>{{$n->texto}}</td>
                    <td>{{$n->publicacao}}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-warning" href="{{route('admin.noticia.editar', $n->id)}}">Editar</a>
                            <form action="{{route('admin.noticia.deletar', $n->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="my-4 d-flex justify-content-center">
            @if (isset($filtros))
            {{$noticias->appends($filtros)->links()}}
        @else
            {{$noticias->links()}}
        @endif
        </div>
        <div class="row col-md-2 row">
            <a class="btn btn-success" href="{{ route('admin.noticia.criar') }}">Cadastrar</a>
        </div>
    </div>
@endsection
