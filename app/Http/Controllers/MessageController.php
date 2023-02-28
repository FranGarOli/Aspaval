<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\MessageRequest;
//necesario para acceder a dicho usuario
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //asignamos el middleware a todos los métodos excepto a store
    public function __construct()
    {
        $this->middleware('auth')->except(['store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->rol == 'admin'){

        }
        $messages = Message::orderBy('created_at', 'desc')->simplePaginate(10);
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Message $message, MessageRequest $request)
    {
        $message = new Message();
        $message->name = $request->name;
        $message->subject = $request->subject;
        $message->text = $request->text;
        $message->save();

        $confirmacion = 'Mensaje enviado correctamente.';

        return view('contacto', compact('confirmacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //si no eres admin te redirige a inicio
        if(auth()->user()->rol != 'admin'){
            return redirect(route('inicio'));
        }else{
            $message->readed = 1;
            $message->save();
            return view('messages.show', compact('message'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect(route('messages.index'));
    }
}
