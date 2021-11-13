<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\noticia;

class noticiaController extends Controller
{
     protected $noticia;

    public function __construct(noticia $noticias)
    {
        $this->noticia = $noticias;
    }

    public function index(){

        $noticias = auth()->user()->noticias()->simplePaginate(2);
        return view('admin.noticia.index', compact('noticias'));
    }

    public function criar(){

        return view('admin.noticia.criar');
    }
    public function editar($id){
    $noticias = $this->noticia->find($id);

    return view('admin.noticia.editar', compact('noticias'));
}
    public function atualizar(request $req, $id){
    $noticia = $req->all();
    $noticias = $this->noticia->find($id);
    $noticias ->update($noticia);
    return redirect()->route('admin.noticia.index');
}
    public function deletar($id){
    $noticias = $this->noticia->find($id);
    $noticias->delete($noticias);

    return redirect() -> back();
}
    public function salvar(request $req){

        $noticia = $req->all();
        $user = auth() -> user();
        $noticias = $user->noticias()->create($noticia);
        return redirect()->route('admin.noticia.index');
    }

    public function pesquisar(request $req){

        $user = auth() ->user();
        $noticias = $user->noticias()->where(function ($q) use ($req) {
            $q->where('titulo', 'LIKE', "%{$req->pesquisa}%");
            $q->orWhere('texto', 'LIKE', "%{$req->pesquisa}%");
         })->paginate(2);



        return view('admin.noticia.index', compact('noticias'));
    }

}

