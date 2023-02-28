<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $miembros = User::all();
        return view('members.index', compact('miembros'));
    }

    public function show(User $member)
    {
        return view('members.show', compact('member'));
    }
}
