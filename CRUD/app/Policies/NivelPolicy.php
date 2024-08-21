<?php

namespace App\Policies;

use App\Http\Controllers\PermissionController;
use App\Models\User;

class NivelPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return PermissionController::isAuthorized('nivel.index');
    }
    public function create(){
        return PermissionController::isAuthorized('nivel.create');
    }
    public function edit(){
        return PermissionController::isAuthorized('nivel.edit');
    }
    public function show(){
        return PermissionController::isAuthorized('nivel.show');
    }
    public function destroy(){
        return PermissionController::isAuthorized('nivel.destroy');
    }
}
