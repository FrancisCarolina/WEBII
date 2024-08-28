<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use App\Models\Nivel;
use Illuminate\Http\Request;
use App\Models\Curso;
use Dompdf\Dompdf;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index', Curso::class);

        $data = Curso::all();
        return view('curso.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $niveis = Nivel::all();  
        $eixos = Eixo::all();   

        return view('curso.create', compact('niveis', 'eixos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $this->authorize('create', Curso::class);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'total_horas' => 'required|numeric|min:1',
            'nivel' => 'required|exists:nivels,id',
            'eixo' => 'required|exists:eixos,id',
        ]);

        $curso = new Curso();
        $curso->nome = $request->nome;
        $curso->sigla = $request->sigla;
        $curso->total_horas = $request->total_horas;
        $curso->nivel_id = $request->nivel;
        $curso->eixo_id = $request->eixo;
        $curso->save();

        return redirect()->route('curso.index')->with('success', 'Curso criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $curso = Curso::findOrFail($id);

        return view('curso.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('edit', Curso::class);
        $curso = Curso::find($id);
        $niveis = Nivel::all();
        $eixos = Eixo::all();
        if(isset($curso)){
            return view('curso.edit', compact('curso', 'niveis', 'eixos'));
        }

        return "<h1>ERRO: CURSO NÃO ENCONTRADO!</h1>";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10',
            'total_horas' => 'required|numeric|min:1',
            'nivel' => 'required|exists:nivels,id',
            'eixo' => 'required|exists:eixos,id',
        ]);

        $curso = Curso::findOrFail($id);
        $curso->nome = $request->nome;
        $curso->sigla = $request->sigla;
        $curso->total_horas = $request->total_horas;
        $curso->nivel_id = $request->nivel;
        $curso->eixo_id = $request->eixo;
        $curso->save();

        return redirect()->route('curso.index')->with('success', 'Curso atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('destroy', Curso::class);

        $curso = Curso::find($id);
        if(isset($curso)){
            $curso->delete();
            return redirect()->route('curso.index');
        }

        return "<h1>ERRO: CURSO NÃO ENCONTRADO!</h1>";
    }

    public function report(){
        $data = Curso::with('eixo')->get();

        $cursosPorEixo = $data->groupBy(function($curso) {
            return $curso->eixo ? $curso->eixo->nome : 'Sem Eixo';
        });

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('curso.pdf', compact('cursosPorEixo'))->render());
        $dompdf->render();
        $dompdf->stream("lista_de_cursos.pdf", array("Attachment" => false));
    }
}
