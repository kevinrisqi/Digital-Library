<!-- resources/views/books/edit.blade.php -->


    <h1>Edit Book</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                {{-- Assume $categories is available, containing a collection of categories --}}
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $book->title }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ $book->description }}</textarea>
        </div>

        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="{{ $book->quantity }}" required>
        </div>

        <div>
            <label for="image">Image URL:</label>
            <input type="text" name="image" id="image" value="{{ $book->image }}" required>
        </div>

        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}" required>
        </div>

        <div>
            <label for="publisher">Publisher:</label>
            <input type="text" name="publisher" id="publisher" value="{{ $book->publisher }}" required>
        </div>

        <div>
            <label for="abstract">Abstract:</label>
            <textarea name="abstract" id="abstract" required>{{ $book->abstract }}</textarea>
        </div>

        <div>
            <label for="ISBN">ISBN:</label>
            <input type="text" name="ISBN" id="ISBN" value="{{ $book->ISBN }}" required>
        </div>

        <button type="submit">Update Book</button>
    </form>
