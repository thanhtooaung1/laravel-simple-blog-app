@extends('layouts.main')

@section('content')
    <div class="row align-items-center justify-content-center" style="height: 80vh">
        <div class="card px-5 py-3 col-md-5">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('categories.index') }}" class="btn border-0 btn-sm"><i
                                class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-md-8">
                        <h4 class="text-center">Update Category</h4>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="my-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="category name"
                        value="{{ old('name', $category->name) }}">
                    @error('name')
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
