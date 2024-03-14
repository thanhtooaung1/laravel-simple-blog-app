<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* number of lines to show */
            line-clamp: 2;
            -webkit-box-orient: vertical;
            color: gray
        }

        .cursor-pointer {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-center container p-5">
        <div class="col-md-8">
            <div class="py-3 d-flex justify-content-between">
                <h3>S Blog</h3>
                @auth
                    <div>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                        {{ Auth::user()->name }}
                    </div>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-3">Login</a>
                @endguest
            </div>
            @forelse ($articles as $article)
                <a href="{{ route('article.read', $article->id) }}" class="text-decoration-none">
                    <div class="card mb-2 p-3 border-0 shadow-sm cursor-pointer">
                        <div class="d-flex justify-content-between">
                            <img src="{{ $article->image }}" height="100x" width="140px" alt=""
                                class="border me-3">
                            <div class="d-flex flex-column pl-2">
                                <div class="card-title">{{ $article->title }}</div>
                                <p class="text">{{ $article->full_text }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p>No articles</p>
            @endforelse
        </div>
    </div>

</body>

</html>
