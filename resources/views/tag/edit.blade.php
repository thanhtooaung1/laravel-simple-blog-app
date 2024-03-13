@extends('layouts.main')

@section('content')
    <div class="row align-items-center justify-content-center" style="height: 80vh">
        <div class="card px-5 py-3 col-md-5">
            <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('tags.index') }}" class="btn border-0 btn-sm"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="col-md-8">
                        <h4 class="text-center">Update Tag</h4>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="my-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="tag name"
                        value="{{ old('name', $tag->name) }}">
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
