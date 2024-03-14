<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container py-5 d-flex justify-content-center">
        <div class="col-sm-8">
            <a href="{{ route('home') }}" class="btn btn-outline-dark">Back</a>
            <img src="{{ $article->image }}" class="mt-3" alt="" width="100%">
            <h3 class="pt-3">{{ $article->title }}</h3>
            <div class="mb-1">
                category :
                <span>{{ $article->category->name }}</span>
            </div>
            <div class="mb-3">
                tags :
                <span>
                    @foreach ($article->tags as $tag)
                        {{ $tag->name }}{{ ' ' }}
                    @endforeach
                </span>
            </div>
            <p>{{ $article->full_text }}</p>
        </div>
    </div>
</body>

</html>
