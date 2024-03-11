<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\DeclaracaoRepository;
use App\Repositories\AlunoRepository;
use App\Repositories\ComprovanteRepository;
use App\Models\Declaracao;

use Illuminate\Support\Facades\Hash;

class DeclaracaoController extends Controller
{

    protected $repository;

    public function __construct(){
       $this->repository = new DeclaracaoRepository();
    }

    public function index()
    {
        $data = $this->repository->selectAllWith(['aluno', 'comprovante']);
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $objAluno = (new AlunoRepository())->findById($request->aluno_id);
        $objComprovante = (new ComprovanteRepository())->findById($request->comprovante_id);

        if(isset($objAluno) && isset($objComprovante)) {
            $obj = new Declaracao();
            $obj->hash = Hash::make($request->aluno_id + $request->comprovante_id);;
            $obj->data = date('Y-m-d H:i:s');
            $obj->aluno()->associate($objAluno);
            $obj->comprovante()->associate($objComprovante);
            $this->repository->save($obj);

            return "<h1>Store - OK!</h1>";
        }

        return "<h1>Store - Not found Aluno or Comprovante!</h1>";
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
        $objAluno = (new AlunoRepository())->findById($request->aluno_id);
        $objComprovante = (new ComprovanteRepository())->findById($request->comprovante_id);

        if(isset($obj) && isset($objAluno) && isset($objComprovante)) {
            $obj->hash = Hash::make($request->aluno_id + $request->comprovante_id);;
            $obj->data = date('Y-m-d H:i:s');
            $obj->aluno()->associate($objAluno);
            $obj->comprovante()->associate($objComprovante);
            $this->repository->save($obj);

            return "<h1>Store - OK!</h1>";
        }

        return "<h1>Store - Not found Aluno or Comprovante!</h1>";
    }

    public function destroy(string $id)
    {
        if($this->repository->delete($id))  {
            return "<h1>Delete - OK!</h1>";
        }

        return "<h1>Delete - Not found Declaracao!</h1>";
    }
}
