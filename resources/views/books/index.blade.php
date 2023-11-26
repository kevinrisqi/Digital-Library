<!-- resources/views/books/index.blade.php -->

<h1>Books</h1>

<a href="{{ route('books.create') }}">Create New Book</a>

<form action="{{ route('books.search') }}" method="GET">
    <input type="text" name="search" placeholder="Search...">
    <button type="submit">Search</button>
</form>

<ul>
    @foreach ($books as $book)
        <li>
            {{ $book->title }} - <a href="{{ route('books.edit', $book->id) }}">Edit</a> |
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" style="border: none; background-color: transparent; color: red; cursor: pointer;">
                    Delete
                </button>
            </form>
        </li>
    @endforeach
</ul>
