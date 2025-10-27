@foreach ($posts as $post)
    • <div>
        • <h2>{{ $post->title }}</h2>
        • <p>{{ $post->content }}</p>
        • <a href="{{ route('posts.edit', $post) }}">Editar</a>
        • <form action="{{ route('posts.destroy', $post) }}" method="POST">
            • @csrf
            • @method('DELETE')
            • <button type="submit">Eliminar</button>
            • </form>
        • </div>
• @endforeach
• <a href="{{ route('posts.create') }}">Crear nueva publicación</a>