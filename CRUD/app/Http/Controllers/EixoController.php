<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eixo;

class EixoController extends Controller
{
    public function index()
    {
        $data = Eixo::all();
        //dd($data);
        return view('eixo.index', compact('data'));
    }

    public function create()
    {
        return view('eixo.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $eixo = new Eixo();
        $eixo->nome = $request->nome;
        //$eixo->descricao = $request->descricao;
        $eixo->save();

        return redirect()->route('eixo.index');
    }

    public function show($id){
        $eixo = Eixo::find($id);
        if(isset($eixo)){
            return view('eixo.show', compact(['eixo']));
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    public function edit($id){
        $eixo = Eixo::find($id);
        if(isset($eixo)){
            return view('eixo.edit', compact(['eixo']));
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    public function update(Request $request, $id){
        $eixo = Eixo::find($id);
        if(isset($eixo)){
            $eixo->nome = $request->nome;
            //$eixo->descricao = $request->descricao;
            $eixo->save();

            return redirect()->route('eixo.index');
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";

    }

    public function destroy($id){

        $eixo = Eixo::find($id);
        if(isset($eixo)){
            $eixo->delete();
            return redirect()->route('eixo.index');
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    public function report($eixo_id){
        return "<h1>${eixo_id}</h1>";
    }
}
