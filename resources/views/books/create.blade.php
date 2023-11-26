<!-- resources/views/books/create.blade.php -->

    <h1>Create New Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                {{-- Assume $categories is available, containing a collection of categories --}}
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" required>
        </div>

        <div>
            <label for="image">Image URL:</label>
            <input type="text" name="image" id="image">
        </div>

        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" required>
        </div>

        <div>
            <label for="publisher">Publisher:</label>
            <input type="text" name="publisher" id="publisher" required>
        </div>

        <div>
            <label for="abstract">Abstract:</label>
            <textarea name="abstract" id="abstract" required></textarea>
        </div>

        <div>
            <label for="ISBN">ISBN:</label>
            <input type="text" name="ISBN" id="ISBN" required>
        </div>

        <button type="submit">Create Book</button>
    </form>
