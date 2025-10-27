<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Muestra la lista de posts
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    public function create()
    {
        // Muestra el formulario de creación
        return view('create');
    }

    public function store(Request $request)
    {
        // Guarda un nuevo post
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required'
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post creado correctamente.');
    }

    public function edit($id)
    {
        // Muestra el formulario de edición
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Actualiza el post
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Elimina el post
        Post::destroy($id);
        return redirect()->route('posts.index')->with('success', 'Post eliminado correctamente.');
    }
}
