<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoriaRepository;
use App\Repositories\CursoRepository;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    protected $repository;

    public function __construct(){
       $this->repository = new CategoriaRepository();
    }
    public function index()
    {
        $data = $this->repository->selectAllWith(['curso']);
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $objCurso = (new CursoRepository())->findById($request->curso_id);
        if(isset($objCurso)) {
            $obj = new Categoria();
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj->maximo_horas = $request->maximo_horas;
            $obj->curso()->associate($objCurso);
            $this->repository->save($obj);

            return "<h1>Store - OK!</h1>";
        }
        return "<h1>Store - Not found Curso!</h1>";
    }

    public function show(string $id)
    {
        $data = $this->repository->findById($id);
        return $data;
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $obj = $this->repository->findById($id);
        $objCurso = (new CursoRepository())->findById($request->curso_id);

        if(isset($obj) && isset($objCurso) ) {
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj->maximo_horas = $request->maximo_horas;
            $obj->curso()->associate($objCurso);

            $this->repository->save($obj);

            return "<h1>Upate - OK!</h1>";
        }
        return "<h1>Upate - Not found Curso or Categoria!</h1>";
    }

    public function destroy(string $id)
    {
        if($this->repository->delete($id)) {
            return "<h1>Delete - OK!</h1>";
            }
        return "<h1>Delete - Not found Cateforia!</h1>";
    }
}
