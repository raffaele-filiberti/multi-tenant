<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json([
            'roles' => Role::all()
        ]);
    }
}
