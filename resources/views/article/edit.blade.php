@extends('layouts.main')

@section('content')
    <div class="row align-items-center justify-content-center py-4">
        <div class="card px-5 py-3 col-md-7">
            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('articles.index') }}" class="btn border-0 btn-sm"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-md-8">
                        <h5 class="text-center">Update Article</h5>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="my-3">
                    <label for="title" class="form-label">Title<sup style="color: red"> *</sup></label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $article->title) }}"
                        placeholder="article title">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="category" class="form-label">Category<sup style="color: red"> *</sup></label>
                    <select id="" class="form-control" name="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category', $article->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-3">
                    <label>Tags<sup style="color: red"> *</sup></label>
                    <div class="d-flex">
                        @foreach ($tags as $tag)
                            <div class="mr-3 d-flex align-items-center">
                                <input type="checkbox" id="{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                                    {{ $article->tags->contains($tag) || in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                <label class="form-check-label ml-1" for="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    @error('tags')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="image" class="form-label">Image</label>
                    <div class="d-flex mb-3">
                        <img class="mr-2" src="{{ $article->image }}" alt="" width="50px" height="50px">
                    </div>
                    <input type="file" class="form-control" name="image">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="full_text" class="form-label">Text<sup style="color: red"> *</sup></label>
                    <textarea class="form-control" name="full_text" placeholder="article title" rows="5">{{ $article->full_text }}</textarea>
                    @error('full_text')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
