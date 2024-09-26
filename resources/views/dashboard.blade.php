<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Book Management</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Search Form -->
        <form method="GET" action="{{ route('dashboard') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search books..." value="{{ request()->query('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <a href="{{ route('create') }}" class="btn btn-primary">Add Book Record</a>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Reset</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name Book</th>
                    <th>Author Name</th>
                    <th>Comment</th>
                    <th>Rating</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $book->book_name }}</td>
                        <td>{{ $book->author_name }}</td>
                        <td>{{ $book->comment }}</td>
                        <td>
                            {{-- Display star rating --}}
                            @for ($j = 1; $j <= 5; $j++)
                                <i class="{{ $book->rating >= $j ? 'fas fa-star' : 'far fa-star' }}"></i>
                            @endfor
                        </td>
                        <td>
                            {{-- Display the image if available --}}
                            @if($book->image)
                                <img src="{{ asset('images/' . $book->image) }}" alt="Book Image" style="width: 50px; height: auto;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('show', $book->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $books->links() }} 
    </body>
    </html>
</x-app-layout>
