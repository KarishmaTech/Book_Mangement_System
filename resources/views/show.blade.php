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
    <h2>Show Record</h2>

    <div class="mb-3 mt-3">
    <label for="book_name">Book Name:</label>
    <p>{{ $book->book_name }}</p>
</div>
<div class="mb-3">
    <label for="author_name">Author Name:</label>
    <p>{{ $book->author_name }}</p>
</div>
<div class="mb-3">
    <label for="comment">Comment:</label>
    <p>{{ $book->comment }}</p>
</div>
<div class="mb-3">
    <label for="rating">Rating:</label>
    <p>{{ $book->rating }}</p>
</div>
<div class="mb-3">
    <label for="image">Image:</label>
   <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->image }}" class="img-fluid" style="max-width: 300px;">

</div>

   
 

</div>

</body>
</html>
</x-app-layout>





