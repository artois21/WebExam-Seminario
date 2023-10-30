<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Crud;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        //
        $posts = Crud::where("posted","yes")->paginate(10);
        return view("web.index",compact('posts'));
    }

    public function show(Crud $post)
    {
        //
        return view("web.show",compact('post'));
    }

    
}
