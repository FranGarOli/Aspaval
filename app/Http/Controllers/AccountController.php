<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;

//necesario para acceder a dicho usuario
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index');
    }

    public function edit(Auth $user)
    {
        return view('account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountRequest $request ,User $account)
    {
        $account->name = $request->get('name');
        $account->birthday = $request->get('birthday');
        $account->twitter = $request->get('twitter');
        $account->instagram = $request->get('instagram');
        $account->twitch = $request->get('twitch');

        if($request->hasFile('image')){
            $archivo = $request->file('image');
            $destino = 'img/perfiles/';
            $nombreArchivo = $account->username.'.png';
            if(file_exists('img/perfiles/'.$account->username.'.png')){
                unlink('img/perfiles/'.$account->username.'.png');
            }
            $subidaExitosa = $archivo->move($destino, $nombreArchivo);
        }

        $account->save();

        return redirect()->route('account.index');
    }
}
