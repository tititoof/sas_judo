<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param User $user
     */
    public function show(User $user)
    {
        //
    }

    /**
     * @param User $user
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * @param Request $request
     * @param User $user
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * @param User $user
     */
    public function destroy(User $user)
    {
        //
    }
}
