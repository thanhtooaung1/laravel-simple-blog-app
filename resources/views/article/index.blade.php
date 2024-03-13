@extends('layouts.main')

@section('content')
    <div class="container p-3">
        <h5 class="mb-3 fw-bold">Articles</h5>
        <div class="row row-cols-1 row-cols-md-2 gap-4">
            @forelse ($articles as $article)
                <div class="col">
                    <div class="card py-3 px-4">
                        <div class="d-flex justify-content-between">
                            <img src="{{ $article->image }}" width="50px" height="50px" alt="" class="border">
                            <div class="d-flex flex-column pl-2">
                                <div class="card-title">{{ $article->title }}</div>
                                <p class="text">{{ $article->full_text }}</p>
                            </div>

                        </div>
                        <div class="d-flex justify-content-end">
                            <div>
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-info btn-sm">U</a>
                            </div>
                            <form class="ml-2" action="{{ route('articles.destroy', $article->id) }}"
                                onsubmit="return confirm('Are you sure to delete this category?');" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">D</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p>No articles</p>
            @endforelse

        </div>
    </div>
@endsection
