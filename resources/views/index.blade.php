<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Posts</title>
</head>

<body>
    <h1>Publicaciones</h1>

    @if ($posts->isEmpty())
        <p>No hay publicaciones todavía.</p>
    @else
        @foreach ($posts as $post)
            <div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>

                <a href="{{ route('posts.edit', $post) }}">Editar</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </div>
        @endforeach
    @endif

    <br>
    <a href="{{ route('posts.create') }}">Crear nueva publicación</a>
</body>

</html>