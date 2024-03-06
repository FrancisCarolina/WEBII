<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CursoRepository;
use App\Models\Curso;

class CursoController extends Controller
{
    protected $repository;

    public function __construct(){
       $this->repository = new CursoRepository();
    }

    public function index()
    {
        $data = $this->repository->selectAllWith(['eixo', 'nivel']);
        return $data;
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
