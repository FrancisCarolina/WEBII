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
        $this->authorize('index', Eixo::class);

        $data = Eixo::all();
        return view('eixo.index', compact('data'));
    }

    public function create()
    {
        $this->authorize('create', Eixo::class);
        return view('eixo.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Eixo::class);
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
        $this->authorize('show', Eixo::class);
        $eixo = Eixo::find($id);
        if(isset($eixo)){
            return view('eixo.show', compact(['eixo']));
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    public function edit($id){
        $this->authorize('edit', Eixo::class);
        $eixo = Eixo::find($id);
        if(isset($eixo)){
            return view('eixo.edit', compact(['eixo']));
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    public function update(Request $request, $id){
        $this->authorize('edit', Eixo::class);
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
        $this->authorize('destroy', Eixo::class);

        $eixo = Eixo::find($id);
        if(isset($eixo)){
            $eixo->delete();
            return redirect()->route('eixo.index');
        }

        return "<h1>ERRO: EIXO NÃO ENCONTRADO!</h1>";
    }

    public function report(){
        $data = Eixo::all();
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('eixo.pdf', compact('data')));
        $dompdf->render();
        $dompdf->stream("nome_do_relatorio.pdf", array("Attachment" => false));
    }

    public function graph() {

        $data = json_encode([
        ["NOME", "TOTAL DE HORAS"],
        ["MARIA", 150],
        ["CARLOS", 90],
        ["JOÃO", 232],
        ["ANA", 197],
        ]);

        return view('eixo.grafico', compact(['data']));
    }
}
