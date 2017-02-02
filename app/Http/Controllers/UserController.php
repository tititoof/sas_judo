<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['id']     = $request->user()->id;
        $data['name']   = $request->user()->name;
        $data['email']  = $request->user()->email;
        return response()->json(['data' => $data]);
    }
}
