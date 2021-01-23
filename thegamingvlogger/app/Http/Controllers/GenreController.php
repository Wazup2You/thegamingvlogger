<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){

        $genres = Genre::with('gameItems')->get();
        return view('genres.index', compact('genres'));
    }

}
