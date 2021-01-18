<?php

namespace App\Http\Controllers;

use App\GameItem;
use App\Genre;
use Illuminate\Http\Request;

class GameItemController extends Controller
{
    public function index()
    {
        return view('game-items.profile', [
            'gameItems' => GameItem::latest()->get()//order by created_at desc
        ]);
    }

    public function create()
    {
        return view('game-items.create', [
            'genres' => Genre::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            //'genre' => ['exist:genres,id'],
            'download_link' => 'required',
        ]);

        $gameItem = new GameItem();
        $gameItem->title = $request->get('title');
        $gameItem->description = $request->get('description');
        $gameItem->image = $request->get('image');
        $gameItem->genre_id = $request->get('genre');
        $gameItem->download_link = $request->get('download_link');

        $gameItem->save();
        return redirect('games')->with('succes', 'Game is opgeslagen!');
    }

    public function show($id)
    {
        $gameItem = GameItem::find($id);
        if ($gameItem === null) {
            abort(404, "Dit gameitem is helaas niet gevonden");
        }

        return view('game-items.show', compact('gameItem'));
    }

    public function edit()
    {

    }
}
