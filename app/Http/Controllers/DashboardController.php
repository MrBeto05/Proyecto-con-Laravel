<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the main dashboard with recent posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Auth::user()->posts()->latest()->take(5)->get();
        
        return view('dashboard', compact('posts'));
    }
}

