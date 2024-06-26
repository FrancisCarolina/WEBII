<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\NivelRepository;
use App\Models\Nivel;


class NivelController extends Controller
{
    protected $repository;

    public function __construct(){
        $this->repository = new NivelRepository();
     }

    public function index()
    {
        $data = $this->repository->selectAll();
        return $data;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $obj = new Nivel();
        $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
        $this->repository->save($obj);
        return "<h1>Store - OK!</h1>";
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
        if(isset($obj)) {
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $this->repository->save($obj);
            return "<h1>Upate - OK!</h1>";
        }

        return "<h1>Upate - Not found Nivel!</h1>";
    }

    public function destroy(string $id)
    {
        if($this->repository->delete($id))  {
            return "<h1>Delete - OK!</h1>";
        }

        return "<h1>Delete - Not found Nivel!</h1>";
    }
}
