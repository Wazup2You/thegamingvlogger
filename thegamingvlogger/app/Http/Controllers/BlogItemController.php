<?php

namespace App\Http\Controllers;

use App\BlogItem;
use Illuminate\Http\Request;

class BlogItemController extends Controller
{

    public function index()
    {
        return view('blog-items.index', [
            'blogItems' => BlogItem::latest()->get()//order by created_at desc
        ]);
    }

    public function show($id)
    {
        return view('blog-items.show', ['blogItem' => BlogItem::find($id)]);
    }


}
