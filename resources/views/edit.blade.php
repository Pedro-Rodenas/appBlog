<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Publicación — TechVerse Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7fb;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            background: linear-gradient(90deg, #005eff, #00c6ff);
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .header__title {
            font-size: 2rem;
            margin-bottom: 6px;
        }

        .main {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .form__group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .form__label {
            margin-bottom: 6px;
            font-weight: 600;
        }

        .form__input, .form__textarea {
            padding: 10px 14px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form__input:focus, .form__textarea:focus {
            border-color: #005eff;
            outline: none;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
            color: white;
        }

        .btn--update {
            background-color: #0096c7;
        }

        .btn--update:hover {
            background-color: #0077b6;
        }

        .btn--back {
            display: inline-block;
            margin-top: 15px;
            color: #005eff;
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 600px) {
            .main { padding: 20px; }
            .header__title { font-size: 1.5rem; }
        }
    </style>
</head>
<body>

<header class="header">
    <h1 class="header__title"><i class="fa-solid fa-pen-to-square"></i> Editar Publicación</h1>
</header>

<main class="main">
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form__group">
            <label for="title" class="form__label">Título</label>
            <input type="text" id="title" name="title" class="form__input" value="{{ $post->title }}" required>
        </div>

        <div class="form__group">
            <label for="content" class="form__label">Contenido</label>
            <textarea id="content" name="content" class="form__textarea" rows="6" required>{{ $post->content }}</textarea>
        </div>

        <button type="submit" class="btn btn--update">
            <i class="fa-solid fa-floppy-disk"></i> Actualizar
        </button>
    </form>

    <a href="{{ route('posts.index') }}" class="btn--back"><i class="fa-solid fa-arrow-left"></i> Volver al listado</a>
</main>

</body>
</html>
