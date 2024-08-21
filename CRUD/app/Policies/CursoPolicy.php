<?php

namespace App\Policies;

use App\Http\Controllers\PermissionController;
use App\Models\User;

class CursoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function index(){
        return PermissionController::isAuthorized('curso.index');
    }
    public function create(){
        return PermissionController::isAuthorized('curso.create');
    }
    public function edit(){
        return PermissionController::isAuthorized('curso.edit');
    }
    public function show(){
        return PermissionController::isAuthorized('curso.show');
    }
    public function destroy(){
        return PermissionController::isAuthorized('curso.destroy');
    }
}
