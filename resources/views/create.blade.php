<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>
<body>

<div class="container mt-3">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Add New Record</h2>
    <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 mt-3">
            <label for="book_name">Book Name</label>
            <input type="text" class="form-control @error('book_name') is-invalid @enderror" 
                   placeholder="Enter Book Name" name="book_name" value="{{ old('book_name') }}">
            @error('book_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author_name">Author Name</label>
            <input type="text" class="form-control @error('author_name') is-invalid @enderror" 
                   placeholder="Enter Author Name" name="author_name" value="{{ old('author_name') }}">
            @error('author_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="comment">Comment</label>
            <input type="text" class="form-control @error('comment') is-invalid @enderror" 
                   placeholder="Enter Comment" name="comment" value="{{ old('comment') }}">
            @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating">Rating</label>
            <select name="rating" class="form-select @error('rating') is-invalid @enderror">
                <option value="">Select a rating</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                        {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                    </option>
                @endfor
            </select>
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image">Image URL</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

</body>
</html>
</x-app-layout>
