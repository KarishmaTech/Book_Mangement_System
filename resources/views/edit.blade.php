 <x-app-layout>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
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
        <input type="text" class="form-control" placeholder="Enter Book Name" value="{{ $book->book_name }}" name="book_name" required>
    </div>
    <div class="mb-3">
        <label for="author_name">Author Name</label>
        <input type="text" class="form-control" placeholder="Enter Author Name" value="{{ $book->author_name }}" name="author_name" required>
    </div>
    <div class="mb-3">
        <label for="comment">Comment</label>
        <input type="text" class="form-control" placeholder="Enter Comment" value="{{ $book->comment }}" name="comment" required>
    </div>
    <div class="mb-3">
        <label for="rating">Rating</label>
      <select name="rating" id="rating" class="form-select" required>
    <option value="" disabled>Select a rating</option>
    <option value="1" {{ $book->rating == 1 ? 'selected' : '' }}>1 Star</option>
    <option value="2" {{ $book->rating == 2 ? 'selected' : '' }}>2 Stars</option>
    <option value="3" {{ $book->rating == 3 ? 'selected' : '' }}>3 Stars</option>
    <option value="4" {{ $book->rating == 4 ? 'selected' : '' }}>4 Stars</option>
    <option value="5" {{ $book->rating == 5 ? 'selected' : '' }}>5 Stars</option>
</select>

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

        <input type="file" class="form-control" name="image" accept="image/*">
        <div class="form-text">Leave this field blank if you do not want to change the image.</div>
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

</body>
</html>
</x-app-layout>





