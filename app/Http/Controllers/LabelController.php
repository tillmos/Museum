<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user() /*&& !Auth::user()->isAdmin()*/ )
            return redirect() -> route('login');
        return view('labels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user())
            return abort(403);
     
        $validated = $request -> validate([
            'name' => 'required|min:3|unique:labels',
            'bg-color' => 'required',
         
        
        ]);
        $validated['color'] = $validated['bg-color'];
       
        Label::create($validated);
        return redirect() -> route('home');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label)
    {
        if(!Auth::user())
            return redirect() -> route('login');
        return view('labels.edit', ['label' => $label]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Label $label)
    {
        if(!Auth::user())
            return redirect() -> route('login');
        
        $validated = $request -> validate([
            'name' => 'required|min:3|unique:labels',
            'bg-color' => 'required',
         
        
        ]);
        $validated['color'] = $validated['bg-color'];
       
        $label->update($validated);
        return redirect() -> route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Label $label)
    {
        //
    }
}
