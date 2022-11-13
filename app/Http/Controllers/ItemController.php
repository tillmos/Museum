<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Label;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.index', [
            'items' => Item::all(),
            'labels' => Label::all(),
            'user_count' => User::count(),
            'comment_count' => Comment::count(),
            'items' => Item::orderBy('obtained', 'desc')->simplePaginate(12),
        
        ]);
    }

    public function details(Item $item)
    {
        return view('items.details', [
            'item' => $item,
            'items' => Item::all()
        ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item, Comment $comments)
    {
        return view('items.show', [
            'item' => $item,
            'items' => Item::all(),
            'comments' => $comments -> item() -> with('item_id') -> get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if(Auth::user() !== null && Auth::id()  == $item -> author -> id)
        $item -> delete();
        return redirect() -> route('home');
    }
}
