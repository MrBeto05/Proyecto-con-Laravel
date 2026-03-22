<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate(10);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   return view('post.create');  }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:150',
            'slug'    => 'nullable|string|max:150|unique:posts,slug',
            'content' => 'required|string',
            'status'  => 'required|in:draft,published',
        ]);
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        auth()->user()->posts()->create($data);
        return redirect()->route('posts.index')->with('success', 'Publicación creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)  // Route Model Binding
    {   $this->authorize('view', $post);  return view('post.show', compact('post'));  }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post){   
            $this->authorize('update', $post);  return view('post.edit', compact('post'));  
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = $request->validate([
            'title' => 'required|string|max:150',
            'slug' => 'required|string|max:150|unique:posts,slug,' . $post->id,
            'content' => 'required|string',
            'status' => 'required|in:draft,published'
        ]);

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Publicación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Publicación eliminada correctamente.');
    }
}

