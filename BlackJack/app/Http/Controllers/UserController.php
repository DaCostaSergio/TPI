<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {

    }

    public function current()
    {
            return auth('sanctum')->user();
    }


    public function count()
    {
        return response(10);
    }
}
