<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    //use HasFactory;
    protected $fillable = [ 'titulo', 'descricao', 'texto', 'publicacao'];

    public function usuario()
    {
    	return $this->belongsTo(User::class);
    }
}