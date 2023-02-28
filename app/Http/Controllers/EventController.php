<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //si el usuario es admin puede ver todos los eventos
        if(auth()->user()->rol == 'admin'){
            $eventos = Event::simplePaginate(6);
            return view('events.index', compact('eventos'));
        }else{
            $eventos = Event::where('visible', 1)->simplePaginate(6);
            return view('events.index', compact('eventos'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //si no eres admin no podras crear un evento
        if(Auth()->user()->rol == 'admin'){
            return view('events.create');
        }else{
            return redirect(route('inicio'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = new Event();
        $event->name = $request->get('name');
        $event->description = $request->get('description');
        $event->location = $request->get('location');
        $event->date = $request->get('date');
        $event->hour = $request->get('hour');
        $event->tags = $request->get('tags');
        $event->visible = $request->has('visible')? 1: 0;
        $event->save();

        return redirect(route('events.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        if($event->visible == 0){
            return redirect(route('events.index'));
        }else{

        }
        return view('events.show', compact('event'));
    }

    public function join(Event $event){
        $user = auth()->user();
        //si el evento está visible te podrás apuntar
        if($event->visible == '1'){
            //si la relacion entre usuario y evento no existe se crea la relacion
            if($user->events()->where('event_id', $event->id)->count() == 0)
            {
                $user->events()->attach($event->id);
            }
            //si la relacion entre usuario y evento existe se elimina la relacion
            else{
                $user->events()->detach($event->id);
            }
        }else{
            return redirect(route('inicio'));
        }
        //redirigimos a la vista del evento para que al recargar no cambie si esta apuntado o no.
        return redirect(route('events.show', compact('event')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //si no eres admin no podras editar un evento
        if(Auth()->user()->rol == 'admin'){
            return view('events.edit', compact('event'));
        }else{
            return redirect(route('inicio'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->name = $request->get('name');
        $event->description = $request->get('description');
        $event->location = $request->get('location');
        $event->date = $request->get('date');
        $event->hour = $request->get('hour');
        $event->tags = $request->get('tags');
        $event->visible = $request->has('visible')? 1: 0;
        $event->save();

        //cargamos la página de ese evento
        return redirect(route('events.show', compact('event')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if(Auth()->user()->rol == 'admin'){
            $event->delete();
            return redirect()->route('events.index');
        }else{
            return redirect(route('inicio'));
        }
    }
}
