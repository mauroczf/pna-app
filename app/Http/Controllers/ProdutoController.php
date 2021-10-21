<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::get();
        return [
            'produto' => $produtos,
            'mensagem' => "Registro de produtos",
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
        Produto::create([
            'titulo' => $data['titulo'],
            'desc' => $data['desc'],
        ]);
        return [
            'produto' => $data,
            'mensagem' => "Registro armazenado com sucesso",
        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        return [
            'produto' => $produto,
            'mensagem' => "Registro listado com sucesso",
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        $produto = Produto::find($id);
        $produto->titulo = $data['titulo'];
        $produto->desc = $data['desc'];
        $produto->save();
        $produto = Produto::find($id);
        return [
            'produto' => $produto,
            'mensagem' => "Registro atualizado com sucesso",
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id)->delete();
        return [
            'produto' => $produto,
            'mensagem' => "Registro deletado com sucesso",
        ];
    }
}
