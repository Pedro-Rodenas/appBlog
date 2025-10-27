<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Listar publicaciones
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    // Mostrar formulario para crear
    public function create()
    {
        return view('posts.create');
    }
    // Guardar una nueva publicación
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Post::create($request->all());
        return redirect()->route('posts.index');
    }
    // Mostrar formulario para editar
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    // Actualizar publicación
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post->update($request->all());
        return redirect()->route('posts.index');
    }
    // Eliminar publicación
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
