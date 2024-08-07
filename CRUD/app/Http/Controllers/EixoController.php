<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eixo;
//use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class EixoController extends Controller
{
    public function index()
    {

        $data = Eixo::all();
        //dd($data);
        //Storage::disk('local')->put('example.txt', 'Contents');
        return view('eixo.index', compact('data'));
    }

    public function create()
    {
        return view('eixo.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        if($request->hasFile('documento')){

            $eixo = new Eixo();
            $eixo->nome = $request->nome;
            $eixo->descricao = $request->descricao;
            $eixo->save();
            $ext= $request->file('documento')->getClientOriginalExtension();
            $nome_arq = $eixo->id.'_'.time().'.'.$ext;
            $request->file('documento')->storeAs("public/", $nome_arq);
            $eixo->url = $nome_arq;
            $eixo->save();

            return redirect()->route('eixo.index');
        }
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

    public function report(){
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('eixo.pdf'));
        $dompdf->render();
        $dompdf->stream("nome_do_relatorio.pdf", array("Attachment" => false));
    }
}
