@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Edit Dashboard Cell</h1>

    <form action="{{ route('dashboard-cell.update', $cell->id) }}" method="POST">
        @csrf
        @method('PATCH') <!-- Use PATCH for partial updates -->

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="url" class="form-control" value="{{ old('title', $cell->title) }}">
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="url" name="url" id="url" class="form-control" value="{{ old('url', $cell->url) }}">
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <select name="color_id" id="color" class="form-select">
                <option value="">Select a color</option>
                @foreach($colors as $color)
                <option value="{{ $color->id }}" {{ $color->id == $cell->color_id ? 'selected' : '' }}>
                    {{ $color->color_name }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Cell</button>
        <a href="{{ route('dashboard.index') }}" class="btn btn-secondary ms-2">Back</a>
    </form>
</div>
@endsection