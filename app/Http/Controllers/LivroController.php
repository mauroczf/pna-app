<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::get();
        return [
            'livro' => $livros,
            'mensagem' => "Registros listados com sucesso",
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        Livro::create([
            'titulo' => $data['titulo'],
            'autor' => $data['autor'],
            'desc' => $data['desc'],
        ]);
        return [
            'titulo' => $data,
            'mensagem' => "Registro criado com sucesso",
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livros = Livro::find($id);
        return [
            'titulo' => $livros,
            'mensagem' => "Registro listado com sucesso",
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        $livros = Livro::find($id);
        $livros->titulo = $data['titulo'];
        $livros->autor = $data['autor'];
        $livros->desc = $data['desc'];
        $livros->save();
        $livros = Livro::find($id);
        return [
            'titulo' => $livros,
            'mensagem' => "Registro atualizado com sucesso",
        ];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livros = Livro::find($id)->delete();
        return [
            'titulo' => $livros,
            'mensagem' => "Registro deletado com sucesso",
        ];
    }
}
