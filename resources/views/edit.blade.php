<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $post->title }}" required>
    <textarea name="content" required>{{ $post->content }}</textarea>
    <button type="submit">Actualizar</button>
</form>