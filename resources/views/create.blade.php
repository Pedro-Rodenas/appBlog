<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Título" required>
    <textarea name="content" placeholder="Contenido" required></textarea>
    <button type="submit">Guardar</button>
</form>