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
  <h2>Add New Record</h2>
 <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
        <label for="book_name">Book Name</label>
        <input type="text" class="form-control" placeholder="Enter Book Name" name="book_name" required>
    </div>
    <div class="mb-3">
        <label for="author_name">Author Name</label>
        <input type="text" class="form-control" placeholder="Enter Author Name" name="author_name" required>
    </div>
    <div class="mb-3">
        <label for="comment">Comment</label>
        <input type="text" class="form-control" placeholder="Enter Comment" name="comment" required>
    </div>
    <div class="mb-3">
        <label for="rating">Rating</label>
         <select name="rating" class="form-select" required>
                <option value="">Select a rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
    </div>
    <div class="mb-3">
        <label for="image">Image URL</label>
        <input type="file" class="form-control" placeholder="Enter Image URL" name="image" required>
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

</body>
</html>
</x-app-layout>





