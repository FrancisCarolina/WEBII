<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ComprovanteRepository;
use App\Repositories\CategoriaRepository;
use App\Repositories\UserRepository;
use App\Repositories\AlunoRepository;
use App\Models\Comprovante;

class ComprovanteController extends Controller
{
    protected $repository;

    public function __construct(){
       $this->repository = new ComprovanteRepository();
    }
    public function index()
    {
        $data = $this->repository->selectAllWith(['categoria','user','aluno']);
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $objCategoria = (new CategoriaRepository())->findById($request->categoria_id);
        $objAluno = (new AlunoRepository())->findById($request->aluno_id);
        $objUser = (new UserRepository())->findById($request->user_id);
        if(isset($objCategoria) && isset($objAluno) && isset($objUser)) {
            $obj = new Comprovante();
            $obj->horas = $request->horas;
            $obj->atividade = mb_strtoupper($request->atividade, 'UTF-8');
            $obj->categoria()->associate($objCategoria);
            $obj->aluno()->associate($objAluno);
            $obj->user()->associate($objUser);
            $this->repository->save($obj);
            return "<h1>Store - OK!</h1>";
        }
        return "<h1>Store - Not found Categoria or Aluno or User!</h1>";
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
        $objCategoria = (new CategoriaRepository())->findById($request->categoria_id);
        $objAluno = (new AlunoRepository())->findById($request->aluno_id);
        $objUser = (new UserRepository())->findById($request->user_id);

        if(isset($obj) && isset($objCategoria) && isset($objAluno) && isset($objUser)) {
            $obj->horas = $request->horas;
            $obj->atividade = mb_strtoupper($request->atividade, 'UTF-8');
            $obj->categoria()->associate($objCategoria);
            $obj->aluno()->associate($objAluno);
            $obj->user()->associate($objUser);
            $this->repository->save($obj);

            return "<h1>Upate - OK!</h1>";
        }
        return "<h1>Upate - Not found Comprovante or Categoria or User or Aluno!</h1>";
    }

    public function destroy(string $id)
    {
        if($this->repository->delete($id)) {
            return "<h1>Delete - OK!</h1>";
            }
        return "<h1>Delete - Not found Comprovante!</h1>";
    }
}
