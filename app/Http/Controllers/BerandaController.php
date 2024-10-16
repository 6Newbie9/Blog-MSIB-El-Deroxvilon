<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post; 
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::where('is_published', 1)->get(); // Get only published posts

        return view('index', compact('categories', 'posts'));
    }

    public function beranda()
    {
        $categories = Category::all();
        $posts = Post::where('is_published', 1)->get(); // Get only published posts

        return view('dashboard', compact('categories', 'posts'));
    }
}
