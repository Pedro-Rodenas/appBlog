<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechVerse Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <script type="module" src="{{ asset('js/global.js') }}"></script>
    <style>
        /* ===== RESET ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7fb;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ===== HEADER ===== */
        .header {
            background: linear-gradient(90deg, #005eff, #00c6ff);
            color: white;
            padding: 20px 40px;
            text-align: center;
        }

        .header__title {
            font-size: 2rem;
            margin-bottom: 6px;
            letter-spacing: 1px;
        }

        .header__subtitle {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* ===== NAV ===== */
        .nav {
            background-color: #fff;
            display: flex;
            justify-content: center;
            gap: 30px;
            padding: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .nav__link {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .nav__link:hover {
            color: #007bff;
        }

        /* ===== MAIN ===== */
        .main {
            flex: 1;
            max-width: 900px;
            margin: 40px auto;
            padding: 0 16px;
        }

        .posts {
            display: grid;
            gap: 24px;
        }

        .post {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }

        .post:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .post__title {
            font-size: 1.5rem;
            color: #005eff;
            margin-bottom: 8px;
        }

        .post__content {
            margin-bottom: 12px;
            line-height: 1.6;
        }

        .post__actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn--edit {
            background-color: #ffb703;
            color: white;
        }

        .btn--edit:hover {
            background-color: #e09b00;
        }

        .btn--delete {
            background-color: #d62828;
            color: white;
        }

        .btn--delete:hover {
            background-color: #b81f1f;
        }

        .btn--create {
            background-color: #0096c7;
            color: white;
            margin-top: 20px;
            text-align: center;
            display: block;
            width: 100%;
        }

        .btn--create:hover {
            background-color: #0077b6;
            color: #FFF;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: #222;
            color: #ccc;
            text-align: center;
            padding: 20px;
            font-size: 0.9rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 600px) {
            .header__title {
                font-size: 1.5rem;
            }

            .post__title {
                font-size: 1.2rem;
            }

            .nav {
                flex-wrap: wrap;
                gap: 15px;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <h1 class="header__title"><i class="fa-solid fa-microchip"></i> TechVerse Blog</h1>
        <p class="header__subtitle">Historias y tendencias del mundo digital 🌐</p>
    </header>

    <nav class="nav">
        <a href="#" class="nav__link"><i class="fa-solid fa-house"></i> Inicio</a>
        <a href="#" class="nav__link"><i class="fa-solid fa-newspaper"></i> Noticias</a>
        <a href="#" class="nav__link"><i class="fa-solid fa-robot"></i> Inteligencia Artificial</a>
        <a href="#" class="nav__link"><i class="fa-solid fa-code"></i> Programación</a>
    </nav>

    <main class="main">
        <section class="posts">
            @if ($posts->isEmpty())
                <p>No hay publicaciones todavía.</p>
            @else
                @foreach ($posts as $post)
                    <article class="post">
                        <h2 class="post__title">{{ $post->title }}</h2>
                        <p class="post__content">{{ $post->content }}</p>
                        <div class="post__actions">
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn--edit">
                                <i class="fa-solid fa-pen"></i> Editar
                            </a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn--delete"
                                    onclick="return confirm('¿Seguro que deseas eliminar este post?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </article>
                @endforeach
            @endif
        </section>

        <a href="{{ route('posts.create') }}" class="btn btn--create">
            <i class="fa-solid fa-plus"></i> Crear nueva publicación
        </a>
    </main>

    <footer class="footer">
        <p>&copy; 2025 TechVerse Blog — Creado por el equipo de innovación digital 🚀</p>
    </footer>

</body>

</html>