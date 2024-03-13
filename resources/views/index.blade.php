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

    <div class="container p-5">
        @forelse ($articles as $article)
            <div class="card mb-2 p-3 border-0 shadow-sm cursor-pointer">
                <div class="d-flex justify-content-between">
                    <img src="{{ $article->image }}" height="100x" width="140px" alt="" class="border me-3">
                    <div class="d-flex flex-column pl-2">
                        <div class="card-title">{{ $article->title }}</div>
                        <p class="text">{{ $article->full_text }}</p>
                    </div>

                </div>
            </div>
        @empty
            <p>No articles</p>
        @endforelse
    </div>

</body>

</html>
