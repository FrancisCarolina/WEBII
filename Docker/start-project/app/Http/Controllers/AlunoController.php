<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AlunoRepository;
use App\Repositories\CursoRepository;
use App\Repositories\UserRepository;
use App\Repositories\TurmaRepository;
use App\Models\Aluno;

use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    protected $repository;

    public function __construct(){
       $this->repository = new AlunoRepository();
    }
    public function index()
    {
        $data = $this->repository->selectAllWith(['curso','turma']);
        return $data;
    }

    public function create()
    {
        //
    }
    public function register()
    {
        $cursos = (new CursoRepository())->selectAll();
        $turmas = (new TurmaRepository())->selectAll();
        return view('aluno.register', compact(['cursos', 'turmas']));
    }
    public function storeRegister()
    {
        $objCurso = (new CursoRepository())->findById($request->curso_id);
        $objTurma = (new TurmaRepository())->findById($request->turma_id);
        if(isset($objCurso) && isset($objTurma) ) {
            $obj = new Aluno();
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj->cpf =  $request->cpf;
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password);
            $obj->curso()->associate($objCurso);
            $obj->turma()->associate($objTurma);
            $this->repository->save($obj);

            return "<h1>Store - OK!</h1>";
        }
        return "<h1>Store - Not found Curso or Turma!</h1>";
    }

    public function store(Request $request)
    {
        $objCurso = (new CursoRepository())->findById($request->curso_id);
        $objTurma = (new TurmaRepository())->findById($request->turma_id);
        $objUser = (new UserRepository())->findById($request->user_id);
        if(isset($objCurso) && isset($objTurma) && isset($objUser)) {
            $obj = new Aluno();
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj->cpf =  $request->cpf;
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password);
            $obj->curso()->associate($objCurso);
            $obj->user()->associate($objUser);
            $obj->turma()->associate($objTurma);
            $this->repository->save($obj);

            return "<h1>Store - OK!</h1>";
        }
        return "<h1>Store - Not found Curso or Turma or User!</h1>";
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
        $objTurma = (new TurmaRepository())->findById($request->turma_id);
        $objUser = (new UserRepository())->findById($request->user_id);

        if(isset($obj) && isset($objCurso) && isset($objTurma) && isset($objUser)) {
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj->cpf = $request->cpf;
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password);
            $obj->curso()->associate($objCurso);
            $obj->user()->associate($objUser);
            $obj->turma()->associate($objTurma);

            $this->repository->save($obj);

            return "<h1>Upate - OK!</h1>";
        }
        return "<h1>Upate - Not found Curso or Turma or User or Aluno!</h1>";
    }

    public function destroy(string $id)
    {
        if($this->repository->delete($id)) {
            return "<h1>Delete - OK!</h1>";
            }
        return "<h1>Delete - Not found Aluno!</h1>";
    }
}
