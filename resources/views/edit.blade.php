<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <h2>Edit Record</h2>
    <form method="post" action="{{ route('update', $book->id) }}" enctype="multipart/form-data">
        @csrf
      

        <div class="mb-3 mt-3">
            <label for="book_name">Book Name</label>
            <input type="text" class="form-control @error('book_name') is-invalid @enderror" 
                   placeholder="Enter Book Name" value="{{ old('book_name', $book->book_name) }}" 
                   name="book_name">
            @error('book_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author_name">Author Name</label>
            <input type="text" class="form-control @error('author_name') is-invalid @enderror" 
                   placeholder="Enter Author Name" value="{{ old('author_name', $book->author_name) }}" 
                   name="author_name">
            @error('author_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="comment">Comment</label>
            <input type="text" class="form-control @error('comment') is-invalid @enderror" 
                   placeholder="Enter Comment" value="{{ old('comment', $book->comment) }}" 
                   name="comment">
            @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="rating">Rating</label>
            <select name="rating" id="rating" class="form-select @error('rating') is-invalid @enderror">
                <option value="" disabled>Select a rating</option>
                <option value="1" {{ old('rating', $book->rating) == 1 ? 'selected' : '' }}>1 Star</option>
                <option value="2" {{ old('rating', $book->rating) == 2 ? 'selected' : '' }}>2 Stars</option>
                <option value="3" {{ old('rating', $book->rating) == 3 ? 'selected' : '' }}>3 Stars</option>
                <option value="4" {{ old('rating', $book->rating) == 4 ? 'selected' : '' }}>4 Stars</option>
                <option value="5" {{ old('rating', $book->rating) == 5 ? 'selected' : '' }}>5 Stars</option>
            </select>
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            
            @if($book->image)
                <div class="mb-2">
                    <img src="{{ asset('images/' . $book->image) }}" alt="Current Image" class="img-fluid" style="max-width:50px;">
                </div>
            @else
                <p>No image available</p>
            @endif

            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Leave this field blank if you do not want to change the image.</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
</x-app-layout>
