@extends('layouts.main')

@section('content')
    <div class="container p-3">
        <h5 class="mb-3 fw-bold">Categories</h5>
        <div class="row row-cols-1 row-cols-md-3 gap-4">
            @forelse ($categories as $category)
                <div class="col">
                    <div class="card py-3 px-4">
                        <div class="row align-items-center justify-content-between">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <div class="row">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">U</a>
                                <form class="ml-2" action="{{ route('categories.destroy', $category->id) }}"
                                    onsubmit="return confirm('Are you sure to delete this category?');" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">D</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No categories</p>
            @endforelse

        </div>
    </div>
@endsection
