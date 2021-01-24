<?php

namespace App\Http\Controllers;


use App\GameItem;
use App\Genre;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GameItemController extends Controller
{
    public function profile()
    {
        //Render a list of a resource.
        if (request('tag')) {
            $gameItems = Tag::where('name', request('tag'))->firstOrFail()->gameItems;
        } else {

            $gameItems = GameItem::all()->whereIn('user_id', Auth::id());
        }

        return view('game-items.profile', ['gameItems' => $gameItems]);

//        return view('game-items.profile', [
//            'gameItems' => GameItem::latest()->get()//order by created_at desc
//        ]);
    }
    public function index()
    {
        //Render a list of a resource.
        if (request('tag')) {
            $gameItems = Tag::where('name', request('tag'))->firstOrFail()->gameItems;
        } else {
            $gameItems = GameItem::latest()->get();
        }

        return view('game-items.all', ['gameItems' => $gameItems]);
    }

    public function create()
    {
        //Shows a view to create a new resource.

        return view('game-items.create', [
            'genres' => Genre::all(),
            'tags' => Tag::all()
        ]);
    }

    public function store(Request $request)
    {
        //Persist the new resource.

        //$this->authorize('update', $request->gameItem);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'genre' => 'exists:genres,id',
            'download_link' => 'required',
            'tags' => 'exists:tags,id',
        ]);
//            $gameItem = new GameItem($this->validateGameItem());
//            $gameItem -> user_id = 1;

        $gameItem = new GameItem();

        $gameItem->title = $request->get('title');
        $gameItem->description = $request->get('description');
        $gameItem->image = $request->get('image');
        $gameItem->genre_id = $request->get('genre');
        $gameItem->download_link = $request->get('download_link');


        $gameItem->user_id = Auth::user()->id;


        $gameItem->save();

        $gameItem->tags()->attach(request('tags'));

        return redirect('games')->with('succes', 'Game is opgeslagen!');
    }

    public function show($id)
    {

        // Show a single resource.

        $gameItem = GameItem::findOrFail($id);
        if ($gameItem === null) {
            abort(404, "Dit game item is helaas niet gevonden");
        }

        return view('game-items.show', compact('gameItem'));
    }

    public function edit($id, User $user)
    {
        //$this->authorize('update', $user->gameItem);

        $gameItem = GameItem::find($id);
        //Show a view to edit an existing resource.
        return view('game-items.edit',
            //compact('genre'),
            compact('gameItem'), [
            'genres' => Genre::all()]
//            'gameItem' => $gameItem
        );
    }

    public function update($id)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            //'genre' => ['exist:genres,id'],
            'download_link' => 'required',
        ]);

        //Persist the edited resource.
        $gameItem = GameItem::find($id);
        $gameItem->title = request('title');
        $gameItem->description = request('description');
        $gameItem->image = request('image');
        $gameItem->genre_id = request('genre');
        $gameItem->download_link = request('download_link');

        $gameItem->save();
        return redirect('games/'.$gameItem->id)->with('succes', 'Game is opgeslagen!');

    }

    public function destroy($id)
    {
        //Delete the resource.
        $gameItem = GameItem::find($id);
        $gameItem->delete();
        return redirect('games')->with('succes', 'Game is verwijderd!');
    }
}
