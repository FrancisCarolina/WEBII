<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index', Nivel::class);

        $data = Nivel::all();
        return view('nivel.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Nivel::class);
        return view('nivel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Nivel::class);

        $nivel = new Nivel();
        $nivel->nome = $request->nome;
        $nivel->save();

        return redirect()->route('nivel.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('edit', Nivel::class);
        $nivel = Nivel::find($id);
        if(isset($nivel)){
            return view('nivel.edit', compact(['nivel']));
        }

        return "<h1>ERRO: NIVEL NÃO ENCONTRADO!</h1>";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Nivel::class);
        $nivel = Nivel::find($id);
        if(isset($nivel)){
            $nivel->nome = $request->nome;
            $nivel->save();

            return redirect()->route('nivel.index');
        }

        return "<h1>ERRO: NIVEL NÃO ENCONTRADO!</h1>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('destroy', Nivel::class);

        $nivel = Nivel::find($id);
        if(isset($nivel)){
            $nivel->delete();
            return redirect()->route('nivel.index');
        }

        return "<h1>ERRO: NIVEL NÃO ENCONTRADO!</h1>";
    }
}
