<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
        {{ !empty($__env->yieldContent('title')) ? ' | ' : '' }}
        {{ $page->site->title }}
    </title>

    @include('_partials.head.favicon')
    @include('_partials.head.meta')
    @include('_partials.cms.identity_widget')

    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
</head>
<body>
    <header>
        <nav>
            <strong>{{ $page->site->title }}</strong><br>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="blog.jesusflores.dev">Blog</a></li>
                <li><a href="https://www.relatoscrudos.com/">Writing(es)</a></li>
                <li><a href="http://jfsgames.com/">Unity3D</a></li>
                <li><a href="http://thesoliditydev.com/">Solidity</a></li>
                <li><a href="https://github.com/sh4ka">GitHub</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <article>
        <section>
            @yield('content')
        </section>
    </article>

    <footer>
        <small>
            Artisan blog by <a href="https://raniesantos.netlify.com">Ranie Santos</a>.
            View the <a href="https://github.com/sh4ka/jesusflores.dev">GitHub repo</a>.
        </small>
    </footer>

    <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
    @includeWhen($page->production, '_partials.analytics')
    @include('_partials.cms.identity_redirect')
</body>
</html>
